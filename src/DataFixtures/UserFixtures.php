<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
        //===================propriétés =================//
    private $encoder; // pour le hashage du mot de passe
        // =============== constructeur===============//
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }


        //===============méthodes====================//
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("lawyer_azri@yahoo.fr");
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $user->setPassword($this->encoder->hashPassword($user, "1admin1"));
        $manager->persist($user);

        $user = new User();
        $user->setEmail("azriavocat@yahoo.fr");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->encoder->hashPassword($user, "admin11"));
        $manager->persist($user);

        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['user'];
    }
}
