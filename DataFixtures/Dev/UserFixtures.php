<?php
// src/DataFixtures/Base/UserFixtures.php
namespace App\DataFixtures\Dev;

use App\Entity\User;
use App\Enum\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $profiles = [
            [
                'email' => 'ces_user@example.com',
                'role' => 'ROLE_CES',
                'status' => Status::ACTIVE,
                'firstname' => 'John',
                'lastname' => 'Doe'
            ],
            [
                'email' => 'tc_user@example.com',
                'role' => 'ROLE_TC',
                'status' => Status::INACTIVE,
                'firstname' => 'Jane',
                'lastname' => 'Smith'
            ],
            [
                'email' => 'constances_user@example.com',
                'role' => 'ROLE_EC',
                'status' => Status::MUST_CHANGE_PASSWORD,
                'firstname' => 'Alice',
                'lastname' => 'Johnson'
            ],
            [
                'email' => 'nvert_user@example.com',
                'role' => 'ROLE_NV',
                'status' => Status::INACTIVE,
                'firstname' => 'Bob',
                'lastname' => 'Brown'
            ],
        ];

        foreach ($profiles as $index => $profile) {
            $user = new User();
            $user->setEmail($profile['email']);
            $user->setRoles([$profile['role']]);
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
            $user->setStatus($profile['status']);
            $user->setFirstname($profile['firstname']);
            $user->setLastname($profile['lastname']);

            $manager->persist($user);

            // Stockez la référence pour l'utiliser dans d'autres fixtures
            $this->addReference('user_' . $index, $user);
        }

        $manager->flush();
    }
}
