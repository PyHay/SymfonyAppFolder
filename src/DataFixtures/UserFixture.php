<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends BaseFixture
{
    public function __construct(public UserPasswordHasherInterface $hasher)
    {
    }

    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, "main_user", function ($i) {
            $user = new User();
            $user
                ->setEmail(sprintf("testuser%d@mail.ru", $i))
                ->setFirstName($this->faker->firstName)
                ->setPassword($this->hasher->hashPassword($user, "123"));

            return $user;
        });

        $manager->flush();
    }
}
