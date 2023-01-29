<?php

namespace App\DataFixtures;

use App\Entity\Matiere;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MatiereFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $matiere = new Matiere();
            $matiere->setLibelle('Matière ' . $i);
            $manager->persist($matiere);
        }

        $manager->flush();
    }
}
