<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Bar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {

            $bar = new Bar();
            $bar
                ->setName($faker->name)
                ->setPicture($faker->image(null, 360, 360, 'animals', true))
                ->setDescription($faker->paragraph(2))
                ->setEmail($faker->email())
                ->setPhone($faker->numerify('##########'))
                ->setAdress($faker->address());

            $manager->persist($bar);
        }

        for ($i = 0; $i < 30; $i++) {

            $artist = new Artist();
            $artist
                ->setNickname($faker->unique()->word())
                ->setPicture($faker->image(null, 360, 360, 'animals', true))
                ->setDescription($faker->paragraph(2))
                ->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setPhone($faker->numerify('##########'))
                ->setEmail($faker->email());

            $manager->persist($artist);
        }

        $manager->flush();
    }
}
