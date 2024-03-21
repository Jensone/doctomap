<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Doctor;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $specialities = [
            'Cardiologue',
            'Dentiste',
            'Généraliste',
            'Ophtalmologue',
            'ORL',
            'Pédiatre',
            'Psychiatre',
            'Radiologue',
            'Urologue'
        ];

        for ($i = 0; $i < 30; $i++) {
            $doctor = new Doctor();
            $doctor->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setSpeciality($specialities[array_rand($specialities)])
                ->setAddress($faker->streetAddress())
                ->setCity($faker->city())
                ->setZip($faker->postcode())
                ->setPhone($faker->phoneNumber())
                ;

            $manager->persist($doctor);
        }

        $manager->flush();
    }
}
