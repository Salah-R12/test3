<?php
namespace App\EventListener;

use DateTime;
use App\Enum\Status;
use App\Entity\Tracking;
use App\Repository\UserRepository;
use Symfony\Component\Routing\RouterInterface;
use App\Repository\TrackingRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Event\LoginFailureEvent;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

/**
 * Traque les connexions des utilisateurs.
 */
final class SecurityEventListener
{
    private TrackingRepository $trackingRepository;
    private UserRepository $userRepository;
    private RouterInterface $router;
    private Security $security;

    public function __construct(
        TrackingRepository $trackingRepository,
        UserRepository $userRepository,
        UrlGeneratorInterface $router,
        Security $security
    ) {
        $this->trackingRepository = $trackingRepository;
        $this->userRepository = $userRepository;
        $this->router = $router;
        $this->security = $security;
    }

    /**
     * Enregistre une connexion réussie.
     *
     * @param LoginSuccessEvent $event L'événement de connexion réussie.
     */
    #[AsEventListener(event: LoginSuccessEvent::class)]
    public function onLoginSuccessEvent(LoginSuccessEvent $event): void
    {
        $userInt = $event->getUser();

        if (is_null($userInt)) {
            return;
        }

        $user = $this->userRepository->findOneBy(['email' => $userInt->getUserIdentifier()]);
        if ($user === null) {
            return;
        }

        if ($user->getStatus() === Status::MUST_CHANGE_PASSWORD) {
            $this->trackAction($user, "AUTHENT OK - MODIF PASSWORD");
            $this->security->logout(false);
            $event->setResponse(new RedirectResponse($this->router->generate('app_modif')));
            return;
        }

        $this->trackAction($user, "AUTHENT OK");
    }

    /**
     * Enregistre une tentative de connexion échouée.
     *
     * @param LoginFailureEvent $event L'événement de connexion échouée.
     */
    #[AsEventListener(event: LoginFailureEvent::class)]
    public function onLoginFailureEvent(LoginFailureEvent $event): void
    {
        $request = $event->getRequest();
        $user = $this->userRepository->findOneBy(['email' => $request->get('username')]);

        $session = $request->getSession();
        $session->set('last_remember_me', (bool) $request->get('_remember_me', false));
        $session->save();

        if (is_null($user)) {  // Sécurité pour les tests phpunit
            return ;
        }

        $this->trackAction($user, "AUTHENT KO");
    }

    /**
     * Enregistre une action dans le tracking.
     *
     * @param $user
     * @param string $action
     */
    private function trackAction($user, string $action): void
    {
        $tracking = new Tracking();
        $tracking->setAction($action);
        $tracking->setTablename("NO TABLE");
        $tracking->setUser($user);
        $tracking->setDateaction(new DateTime());

        $this->trackingRepository->save($tracking);
    }
}