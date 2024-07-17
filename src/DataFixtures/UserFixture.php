<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, "main_user", function ($i) {
            $user = new User();
            $user
                ->setEmail(sprintf("testuser%d@mail.ru", $i))
                ->setFirstName($this->faker->firstName);

            return $user;
        });

        $manager->flush();
    }
}
