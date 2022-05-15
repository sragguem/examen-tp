<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Etudiantfixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i=0; $i < 100; $i++) {
            $etudiant = new Etudiant();
            $etudiant->setNom($faker->name);
            $etudiant->setPrenom($faker->firstName);
            $section=new Section();
            $manager->persist($section);
            $manager->flush();
            $etudiant->setFiliere($section);

            $manager->persist($etudiant);


        }
        $manager->flush();
    }
}
