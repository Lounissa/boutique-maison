<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixtures extends Fixture
{
   //================propriété ===================//
  public const NOUVEAUTES = "nouveautes";
  public const MOBILIER = "mobilier";
  public const DECORATION = "décoration";
  public const LINGE_DE_MAISON = "linge de maison";
  public const ART_DE_LA_TABLE = "art de la table";
  public const RANGEMENT = "rangement";
  public const JARDIN = "jardin";
  public const INSPIRATIONS = "inspirations";
   //==============methodes=====================//

    public function load(ObjectManager $manager): void
    {
        $categorie = new Categorie();
        $categorie->setNom("Nouveautés");
        $categorie->setSlug("nouveautes");
        $categorie->setDescription("Que votre décoration soit de style et s’inspire d’un esprit bohème, renouvelez simplement votre univers..");
        $categorie->setImageName("nouveaute.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->isIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
         //on crée une réference pour la catégorie "nouveautés" que l'on pourra utiliser dans 
        // d'autres fixtures et la ctégorie est associée à la constance NOUVEAUTES
        $this->addReference(self::NOUVEAUTES, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Mobilier");
        $categorie->setSlug("mobilier");
        $categorie->setDescription("Retrouvez une sélection de meubles pour toutes les pièces de la maison.");
        $categorie->setImageName("mobilier.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->isIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        //on crée une réference pour la catégorie "mobilier" que l'on pourra utiliser dans 
        // d'autres fixtures et la ctégorie est associée à la constance MOBILIER
        $this->addReference(self::MOBILIER, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Décoration");
        $categorie->setSlug("décoration");
        $categorie->setDescription("Soignez les détails et succombez pour notre sélection décoration pour votre maison. ");
        $categorie->setImageName("decoration.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->isIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        //on crée une réference pour la catégorie "Décoration" que l'on pourra utiliser dans 
        // d'autres fixtures et la ctégorie est associée à la constance DECORATION
        $this->addReference(self::DECORATION, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Linge de maison");
        $categorie->setSlug("linge-de-maison");
        $categorie->setDescription("Découvrez notre sélection de linge de maison pour toutes les pièces de la maison. ");
        $categorie->setImageName("linge-de-maison.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->isIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        //on crée une réference pour la catégorie "Linge de maison" que l'on pourra utiliser dans 
        // d'autres fixtures et la ctégorie est associée à la constance LINGE DE MAISON
        $this->addReference(self::LINGE_DE_MAISON, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Art de la table");
        $categorie->setSlug("art-de-la-table");
        $categorie->setDescription("Vaisselle irrésistible pour la plus belle table pour tous les jours ou ceux de fêtes");
        $categorie->setImageName("art-de-la-table.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->isIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        //on crée une réference pour la catégorie "Art de la table " que l'on pourra utiliser dans 
        // d'autres fixtures et la ctégorie est associée à la constance ART DE LA TABLE
        $this->addReference(self::ART_DE_LA_TABLE, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Rangement");
        $categorie->setSlug("rangement");
        $categorie->setDescription("Des idées pratiques pour ranger : panier, porte-manteau, patère, panier à  linge, portant, meuble d'entrée, meuble à chaussures, accessoires salle de bains, ... ");
        $categorie->setImageName("rangement.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->isIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        //on crée une réference pour la catégorie "Rangement" que l'on pourra utiliser dans 
        // d'autres fixtures et la ctégorie est associée à la constance RANGEMENT
        $this->addReference(self::RANGEMENT, $categorie);
    
        $categorie = new Categorie();
        $categorie->setNom("Jardin");
        $categorie->setSlug("jardin");
        $categorie->setDescription("Profitez du jardin toute l’année grâce à nos nouveautés jardin.");
        $categorie->setImageName("jardin.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->isIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        //on crée une réference pour la catégorie "Jardin" que l'on pourra utiliser dans 
        // d'autres fixtures et la ctégorie est associée à la constance JARDIN
        $this->addReference(self::JARDIN, $categorie);

        $categorie = new Categorie();
        $categorie->setNom("Inspirations");
        $categorie->setSlug("inspirations");
        $categorie->setDescription("Que votre décoration soit de style scandinave, factory, vintage, ou s’inspire d’un esprit bohème, renouvelez simplement votre univers.");
        $categorie->setImageName("insperation.webp");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->isIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        //on crée une réference pour la catégorie "Inspirations" que l'on pourra utiliser dans 
        // d'autres fixtures et la ctégorie est associée à la constance INSPIRATIONS
        $this->addReference(self::INSPIRATIONS, $categorie);

    }
}
