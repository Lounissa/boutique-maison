<?php

namespace App\DataFixtures;

use App\Entity\Home;
use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomeFixtures extends Fixture
{
    
   
   

    public function load(ObjectManager $manager): void
    {
     

        $home = new Home();
        $home->setTitre('Bienvenue sur la Boutique Maison');
        $home->setTexte("Découvrez les dernières tendances de la leterie aux accessoires");
        $home->setIsActive(true);
        $manager->persist($home);

      


       
        $home = new Home();
        $home->setTitre('Bienvenue sur la Boutique Maison');
        $home->setTexte("Découvrez les nouveautés de la leterie aux accessoires");
        $home->setIsActive(false);
        $manager->persist($home);


        $manager->flush();
    }
}
