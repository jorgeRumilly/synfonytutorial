<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    protected $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $users = [
            ['name' => 'Martins', 'firstname' => 'Jorge', 'email' => 'jorge.sj4web@gmail.com', 'password' => 'password123', 'roles' => ['ROLE_USER']],
            ['name' => 'Admin', 'firstname' => 'Jorge', 'email' => 'jorge.admin@fakemail.com', 'password' => 'admin123', 'roles' => ['ROLE_ADMIN']],
            ['name' => 'Employee', 'firstname' => 'Jorge', 'email' => 'jorge.employee@fakemail.com', 'password' => 'employee123', 'roles' => ['ROLE_EMPLOYEE']],
        ];

        foreach ($users as $userData) {
            $user = new User();
            $user->setName($userData['name']);
            $user->setFirstname($userData['firstname']);
            $user->setEmail($userData['email']);
            $user->setPassword($this->encoder->hashPassword($user, $userData['password']));
            $user->setRoles($userData['roles']);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
