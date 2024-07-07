<?php
namespace App\EventListener;

use DateTime;
use App\Entity\Tracking;
use App\Entity\User;
use App\Repository\TrackingRepository;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Events;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\ORM\Event\PostPersistEventArgs;


/**
 * Ajout d'une ligne dans la table de tracking après chaque ajout d'objet dans la 
 * base de données par un utilisateur. 
 */
#[AsDoctrineListener(event: Events::postPersist, priority: 500, connection: 'default')]
class PersistEventListener
{
    private Security $security;
    private TrackingRepository $trackingRepository;
    public function __construct(Security $security, TrackingRepository $trackingRepository)
    {
        $this->security = $security;
        $this->trackingRepository = $trackingRepository;
    }

    /**
     * Après enregistrement d'une modification ou d'un nouvelle entitée dans la base de donnée,
     * enregistrer l'action dans la table de tracking
     * 
     * @param PostPersistEventArgs $args Contient l'entité enregistré
     */
    public function PostPersist(PostPersistEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof Tracking) {

            $entityManager = $args->getObjectManager();

            $userInt = $this->security->getUser();

            if (is_null($userInt)) {  // Sécurité pour les tests phpunit
                return ;
            }

            $user = $entityManager->getRepository(User::class)->findOneBy([
                'email' => $userInt->getUserIdentifier()
            ]);

            $tracking = new Tracking();
            $tracking->setAction("ADD");
            $tracking->setTablename($entityManager->getClassMetadata(get_class($entity))->getTableName());
            $tracking->setUser($user);
            $tracking->setDateaction(new DateTime());

            $this->trackingRepository->save($tracking);
        }
    }
}