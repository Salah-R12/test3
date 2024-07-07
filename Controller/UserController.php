<?php
// src/Controller/UserController.php
// src/Controller/UserController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\UserFilterType;
use App\Entity\User;

class UserController extends AbstractController
{
    #[Route('/users', name: 'user_list')]
    public function list(Request $request, EntityManagerInterface $em, PaginatorInterface $paginator): Response
    {
        // Création du formulaire de filtre
        $filterForm = $this->createForm(UserFilterType::class);
        $filterForm->handleRequest($request);

        // Requête de base pour récupérer les utilisateurs
        $queryBuilder = $em->getRepository(User::class)->createQueryBuilder('u');

        // Ajout des filtres
        if ($filterForm->isSubmitted() && $filterForm->isValid()) {
            $criteria = $filterForm->getData();

            if ($criteria['search']) {
                $queryBuilder->andWhere('u.firstName LIKE :search OR u.lastName LIKE :search OR u.email LIKE :search')
                    ->setParameter('search', '%' . $criteria['search'] . '%');
            }

            if ($criteria['profileType']) {
                $queryBuilder->andWhere('JSON_CONTAINS(u.roles, :profileType) > 0')
                    ->setParameter('profileType', json_encode([$criteria['profileType']]));
            }

            if ($criteria['status']) {
                $queryBuilder->andWhere('u.status = :status')
                    ->setParameter('status', $criteria['status']->value);
            }
        }

        // Utilisation de KnpPaginator pour la pagination
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(), // Requête
            $request->query->getInt('page', 1), // Numéro de la page courante
            10 // Nombre d'utilisateurs par page
        );

        // Compter le nombre total d'utilisateurs après filtrage
        $filteredUserCount = $pagination->getTotalItemCount();

        // Compter le nombre total d'utilisateurs dans la base
        $totalUserCount = $em->getRepository(User::class)->count([]);

        // Rendu de la vue avec la variable filterForm
        return $this->render('user/list.html.twig', [
            'pagination' => $pagination,
            'filterForm' => $filterForm->createView(),
            'filteredUserCount' => $filteredUserCount,
            'totalUserCount' => $totalUserCount,
        ]);
    }

    #[Route('/user/edit/{id}', name: 'user_edit', requirements: ['id' => '\d+'])]
    public function edit(int $id): Response
    {

        return new Response('Placeholder pour éditer l\'utilisateur avec ID: ' . $id);
    }

    #[Route('/user/add', name: 'user_add')]
    public function add(): Response
    {
        // Placeholder pour l'ajout d'un utilisateur
        return new Response('Placeholder pour ajouter un nouvel utilisateur.');
    }
}
