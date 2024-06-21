<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\ArtisteCategory;
use App\Entity\Bar;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ){}
    private const NAME_CATEGORY = ["Le classique", "Le jazz", "La variété française", "La variété internationale", "Les musiques du monde", "Le rap", "La musique électronique"];
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i < 15; $i++) {

            $bar = new Bar();
            $bar
                ->setName($faker->name)
                ->setPicture('bar'. $i. ".jpg")
                ->setDescription($faker->paragraph(2))
                ->setEmail($faker->email())
                ->setPhone($faker->numerify('##########'))
                ->setAdress($faker->address());

            $manager->persist($bar);
        }

        foreach (self::NAME_CATEGORY as $categoryName) {
            $category = new ArtisteCategory;
            $category
                ->setName($categoryName)
                ->setColor($faker->safeColorName());
                $manager->persist($category);
                $arrayCategory[] = $category;
        }

        for ($i = 1; $i < 16; $i++) {

            $artist = new Artist();
            $artist
                ->setNickname($faker->unique()->word())
                ->setPicture('photo'. $i. ".png")
                ->setDescription($faker->paragraph(2))
                ->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setPhone($faker->numerify('##########'))
                ->setEmail($faker->email())
                ->setArtistCategory($faker->randomElement($arrayCategory));

            $manager->persist($artist);
        }

        $admin = new User();
        $admin
            ->setEmail('admin@admin.com')
            ->setPassword($this->passwordHasher->hashPassword($admin, 'admin'))
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $manager->flush();
    }
}
