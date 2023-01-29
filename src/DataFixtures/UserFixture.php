<?php

namespace App\DataFixtures;

use App\Entity\Joueur;
use App\Entity\Matiere;
use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {

        $user = new Joueur();
        $user->setUsername('admin');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'admin'
        ));
        $user->setNom('Aramion');
        $user->setPrenom('Maël');
        $user->setHp(100);
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        // ------------------------------------------------------

        for($i = 0; $i<10; $i++){
            $user = new Joueur();
            $user->setUsername('user'.$i);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'user'.$i
            ));
            $user->setNom('Test'.$i);
            $user->setPrenom('User'.$i);
            $user->setHp(100);
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
        }

        $manager->flush();

    }
}
