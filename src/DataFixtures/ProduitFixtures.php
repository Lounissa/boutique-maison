<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\DataFixtures\CategorieFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProduitFixtures extends Fixture
{
    //===================proprietes============//
    
    public const PORTE_MONTEAU_MURAL = "porte-monteau-mural";
    public const VERRERIE = "verrerie";
    public const RIDEAUX_NOUVEAUTES = "rideaux-nouveautes";
    public const PORTE_SERVIETTES = "porte-serviettes";
    public const RANGEMENT_DOUCHE = "rangement-douche";
    public const COUSSIN = "coussin";
    public const SERVICE_VAISSELLE = "service-vaisselle";
    public const ORGANISATEUR_DE_BIJOUX = "organisateur-de-bijoux";
    public const ORGANISATEUR_MULTI_NIVEAUX = "organisateur-multi-niveaux";
    public const CASIER_A_VIN = "casier-a-vin";
    public const CANAPE = "canape";
    public const ARMOIRE_MURALE = "armoire_murale";
    public const COUETTES = "couettes";
    public const ART_DE_LA_TABLE ="art-de-la-table";
    public const UNITE_DE_RANGEMENT = "unite-de-rangement";
    public const PANIER_JARDIN = "panier-jardin";
    public const COLLECTION_LUXE = "collection-luxe";
    public const ARMOIRE = "armoire";
    public const SOUS_MEUBLE_DE_LAVABO = "sous-meuble-de-lavabo";
    public const FAUTEUIL ="fauteuil";
    public const ETAGERE_MURALE = "etagere-murale";
    public const CANAPE_SALON = "canape-salon";
    public const TABLE_SALON = "table-salon";
    public const CHAMBRE_POUR_ENFANT = "chambre-pour-enfant";
    public const CHAMBRE = "chambre";
    public const BIBLIOTHEQUE = "bibliotheque";
    public const DECO_MURALES = "deco-murales";
    public const DECO_CHAMBRE = "deco-chambre";
    public const MEROIR_MURALE = "meroir-murale";
    public const TAPIS_DE_BAIN = "tapis-de-bain";
    public const COLLECTION_DECO = "collection-deco";
    public const CADRE_DECO = "cadre-deco";
    public const CHEMIN_DE_LA_TABLE = "chemin-de-la-table";
    public const JETE_EN_PELUCHE = "jete-en-peluche";
    public const LONG_PLAID = "long-plaid";
    public const PARURE_HAUSSE_DE_COUETTE = "parure-hausse-de-couette";
    public const DESSOUS_DE_LIT_SAM_FAIERS = "dessous-de-lit-sam-faiers";
    public const TAPIS_ARCTIC_DOUILLET = "tapis-arctic-douillet";
    public const RIDEAUX_EN_VALOURS = "rideaux-en-valours";
    public const TAPIS_SUPER_DOUX = "tapis-super-doux";
    public const LOT_DE_EMBRASSES_DE_RIDEAUX = "lot-de-embrasses-de-rideaux";
    public const METALLISE_RAYE_RIDEAUX = "metallise-raye-rideaux";
    public const BRONX_SALVAGE_ABSTRACT_RUNNER = "bronx-salvage-abstract-runner";
    public const COUSSIN_EN_VALOURS = "coussin-en-valours";
    public const BRONX = "bronx";
    public const MOTIF_COEUR = "motif-coeur";
    public const NAPPE_HALLOWEEN = "nappe-halloween";
    public const SETS_DE_TABLE = "sets-de-table";
    public const COUSSIN_EN_VELOURS_ART = "coussin-en-velours-art";
    public const VERNIS_LOGAN = "vernis-logan";
    public const SIMILICUIR_REVERSIBLE = "similicuir-reversible";
    public const MUGS_BRONX = "mugs-bronx";
    public const PORTE_BOUTEILLE_DE_BOTTE = "porte-bouteille-de-botte";
    public const CADDY_D_ANGLE = "caddy-d-angle";
    public const CROCHETS_MALVERN = "crochets-malvern";
    public const BOITE_A_BIJOUX = "boite-a-bijoux";
    public const MEUBLE_A_CHAUSSURES = "meuble-a-chaussures";
    public const PLACARD_D_ANGLE = "placard-d-angle";
    public const PANIER_BEBE = "panier-bebe";
    public const ETAGERE_UMBRA_BELLWOOD = "etagere-umbra-bellwood";
    public const PORTE_CHAUSSURES = "porte-chaussures";
    public const PORTE_MONTEAU = "porte-monteau";
    public const MEUBLE_EN_BAMBOU = "meuble-en-bambou";
    public const FAUTEUIL_BAS_LOUNGE = "fauteuil-bas-lounge";
    public const CHAISE_LONGUE = "chaise-longue";
    public const BAR_EN_BAMBOU = "bar-en-bambou";
    public const PORTANT_A_VETEMENTS = "portant-a-vetements";
    public const TABLE_DE_JARDIN = "table-de-jardin";
    public const BIBLIOTHEQUE_JARDIN = "bibliotheque-jardin";
    public const BANC_PLIANT = "banc-pliant";
    public const TABLE_BASSE = "table-basse";
    public const LAURA_ASHLEY = "laura-ashley";
    public const CATHERINE_LANSFIELD = "catherine-lansfield";
    public const FURN = "furn";
    public const SERVIETTES = "serviettes";
    public const RIDEAUX_INSPIRATIONS = "rideaux-inspirations";
    public const COUVERTURES = "couvertures";
    public const RANGEMENT_DE_CUISINE = "rangement-de-cuisine";
    public const TAPIS_DE_BAIN_INSPIRATION = "tapis-de-bain-inspiration";
    public const ETAGERE_MURALE_POUR_POELES = "etagere-murale-pour-poeles";

    //==========methodes=====================//

    public function load(ObjectManager $manager): void
    {
       // produits de catégorie Nouveautés ========================//
        $produit = new Produit();
        $produit->setNom("Porte Monteau Mural");
        $produit->setSlug("porte-monteau-mural");
        $produit->setDescription("Porte-manteau mural Umbra Dotsy 7 crochets.");
        $produit->setPrix(90);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::PORTE_MONTEAU_MURAL, $produit);

        $produit = new Produit();
        $produit->setNom("Verrerie");
        $produit->setSlug("verrerie");
        $produit->setDescription("Verrerie Hollis.");
        $produit->setPrix(66);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::VERRERIE, $produit);

        $produit = new Produit();
        $produit->setNom("Rideaux Nouveautés");
        $produit->setSlug("rideaux-nouveautes");
        $produit->setDescription("Rideaux Nouvelle Collection.");
        $produit->setPrix(175);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::RIDEAUX_NOUVEAUTES, $produit);

        $produit = new Produit();
        $produit->setNom("Porte Serviettes");
        $produit->setSlug("porte-serviettes");
        $produit->setDescription("Porte-serviettes Umbra Buddy.");
        $produit->setPrix(68);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::PORTE_SERVIETTES, $produit);

        $produit = new Produit();
        $produit->setNom("Rangement Douche");
        $produit->setSlug("rangement-douche");
        $produit->setDescription("Rangement douche Umbra Flex.");
        $produit->setPrix(106);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::RANGEMENT_DOUCHE, $produit);

        $produit = new Produit();
        $produit->setNom("Coussin");
        $produit->setSlug("coussin");
        $produit->setDescription("Coussin géométrique.");
        $produit->setPrix(90);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::COUSSIN, $produit);

        $produit = new Produit();
        $produit->setNom("Service Vaisselle");
        $produit->setSlug("service-vaisselle");
        $produit->setDescription("Service vaisselle glacé 12 pièces.");
        $produit->setPrix(118);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::SERVICE_VAISSELLE, $produit);

        $produit = new Produit();
        $produit->setNom("Organisateur de Bijoux");
        $produit->setSlug("organisateur-de-bijoux");
        $produit->setDescription("Organisateur de bijoux Umbra Moona.");
        $produit->setPrix(163);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::ORGANISATEUR_DE_BIJOUX, $produit);

        $produit = new Produit();
        $produit->setNom("Organisateur Multi Niveaux");
        $produit->setSlug("organisateur-multi-niveaux");
        $produit->setDescription("Organisateur multi-niveaux Umbra Holster.");
        $produit->setPrix(90);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::ORGANISATEUR_MULTI_NIVEAUX, $produit);

        $produit = new Produit();
        $produit->setNom("Casier à Vin");
        $produit->setSlug("casier-a-vin");
        $produit->setDescription("Casier à vin Umbra Vinola.");
        $produit->setPrix(136);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::NOUVEAUTES));
        $manager->persist($produit);
        $this->addReference(self::CASIER_A_VIN, $produit);

        //================Produits de Catégorie Mobilier=============//
        $produit = new Produit();
        $produit->setNom("Canapé");
        $produit->setSlug("canape");
        $produit->setDescription("Le canapé donne le ton dès le séjour, c’est l’élément central du salon à choisir minutieusement
                                  et sur lequel il faut miser.  Retrouvez notre sélection de canapés qui conviennent à tous les styles.");
        $produit->setPrix(79,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::CANAPE, $produit);

        $produit = new Produit();
        $produit->setNom("Armoire");
        $produit->setSlug("armoire");
        $produit->setDescription("Envie d'optimiser vos rangements pour gagner en liberté de mouvement ? Misez sur une armoire ou
                                 une penderie.");
        $produit->setPrix(49,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::ARMOIRE, $produit);

        $produit = new Produit();
        $produit->setNom("Sous meuble de lavabo");
        $produit->setSlug("sous-meuble-de-lavabo");
        $produit->setDescription("Sous-meuble de lavabo Bronx effet chêne");
        $produit->setPrix(49,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::SOUS_MEUBLE_DE_LAVABO, $produit);


        $produit = new Produit();
        $produit->setNom("Fauteuil");
        $produit->setSlug("fauteuil");
        $produit->setDescription("Installez-vous dans un rocking-chair Bloomingville pour lire, ou tout simplement pour savourer l’instant. Profitez de la douceur d’un fauteuil en tissu à la fin d’une journée.");
        $produit->setPrix(29,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::FAUTEUIL, $produit);


        $produit = new Produit();
        $produit->setNom("Etagère murale");
        $produit->setSlug("etagere-murale");
        $produit->setDescription("Découvrez notre sélection d'étagères murales indispensables dans toutes les pièces de la maison.");
        $produit->setPrix(49,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::ETAGERE_MURALE, $produit);

        $produit = new Produit();
        $produit->setNom("Canapé salon");
        $produit->setSlug("canape-salon");
        $produit->setDescription("Meubles pour le salon : Canapé, Table basse, ..");
        $produit->setPrix(49,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::CANAPE_SALON, $produit);

        $produit = new Produit();
        $produit->setNom("Table salon");
        $produit->setSlug("table-salon");
        $produit->setDescription("Découvrez notre sélection de tables : table de salle à manger pour recevoir famille et amis 
                                  avec beaucoup de convivialité.");
        $produit->setPrix(49,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::TABLE_SALON, $produit);

        $produit = new Produit();
        $produit->setNom("Chambre pour enfant");
        $produit->setSlug("chambre-pour-enfant");
        $produit->setDescription("Découvrez notre sélection de meubles pour la chambre d'enfants, ...");
        $produit->setPrix(89,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::CHAMBRE_POUR_ENFANT, $produit);

        $produit = new Produit();
        $produit->setNom("Chambre");
        $produit->setSlug("chambre");
        $produit->setDescription("Découvrez notre sélection de meubles pour la chambre, ...");
        $produit->setPrix(99,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::CHAMBRE, $produit);

        $produit = new Produit();
        $produit->setNom("Bibliothèque");
        $produit->setSlug("bibliotheque");
        $produit->setDescription("Optez pour un rangement pratique et efficace avec notre sélection de bibliothèques, ...");
        $produit->setPrix(79,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::MOBILIER));
        $manager->persist($produit);
        $this->addReference(self::BIBLIOTHEQUE, $produit);
 

        //======================Produits de Catégorie de Décoration ==================//
        $produit = new Produit();
        $produit->setNom("Armoire murale");
        $produit->setSlug("armoire-murale");
        $produit->setDescription("Mur de cadres, ex-voto, affiches, couronnes... Découvrez notre sélection de produits déco 
                                  pour un mur dans l'air du temps.");
        $produit->setPrix(59,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::ARMOIRE_MURALE, $produit);

        $produit = new Produit();
        $produit->setNom("Déco murales");
        $produit->setSlug("deco-murales");
        $produit->setDescription("Découvrez notre sélection de produits déco pour un mur dans l'air du temps.");
        $produit->setPrix(49,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::DECO_MURALES, $produit);

        $produit = new Produit();
        $produit->setNom("Déco chambre");
        $produit->setSlug("deco-chambre");
        $produit->setDescription("Découvrez notre sélection de produits déco pour un mur dans l'air du temps.");
        $produit->setPrix(49,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::DECO_CHAMBRE, $produit);

        $produit = new Produit();
        $produit->setNom("Meroir murale");
        $produit->setSlug("meroir-murale");
        $produit->setDescription("Découvrez notre sélection de miroirs irrésistibles pour toutes les pièces de la maison");
        $produit->setPrix(79,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::MEROIR_MURALE, $produit);

        $produit = new Produit();
        $produit->setNom("Tapis de bain");
        $produit->setSlug("tapis-de-bain");
        $produit->setDescription("Un joli tapis est un atout déco incontournable pour votre bain.");
        $produit->setPrix(29,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::TAPIS_DE_BAIN, $produit);
        
        $produit = new Produit();
        $produit->setNom("Colllection déco");
        $produit->setSlug("collection-deco");
        $produit->setDescription("Artist Collection 'Harris Panorama' Paysage par Scott Naismith Déco murale sur toile encadrée.");
        $produit->setPrix(152,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::COLLECTION_DECO, $produit);

        $produit = new Produit();
        $produit->setNom("Cadre déco");
        $produit->setSlug("cadre-deco");
        $produit->setDescription("Artist Collection 'Harris Panorama' Paysage par Scott Naismith Déco murale sur toile encadrée.");
        $produit->setPrix(152,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::CADRE_DECO, $produit);

        $produit = new Produit();
        $produit->setNom("Chemin de la table");
        $produit->setSlug("chemin-de-la-table");
        $produit->setDescription("Chemin de table extra doux Luna Ombre.");
        $produit->setPrix(102,93);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::CHEMIN_DE_LA_TABLE, $produit);

        $produit = new Produit();
        $produit->setNom("Jeté en peluche");
        $produit->setSlug("jete-en-peluche");
        $produit->setDescription("Jeté en peluche en fausse fourrure.");
        $produit->setPrix(152,90);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::JETE_EN_PELUCHE, $produit);

        $produit = new Produit();
        $produit->setNom("Long Plaid");
        $produit->setSlug("long-plaid");
        $produit->setDescription("Long plaid en fausse fourrure.");
        $produit->setPrix(172,90);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::DECORATION));
        $manager->persist($produit);
        $this->addReference(self::LONG_PLAID, $produit);
        
        //===========================Produits de Catégorie Linge de maison===========//
        $produit = new Produit();
        $produit->setNom("Couettes");
        $produit->setSlug("couettes");
        $produit->setDescription("Découvrez notre sélection de linge de lit");
        $produit->setPrix(39,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::COUETTES, $produit);

        $produit = new Produit();
        $produit->setNom("Parure hausse de couette");
        $produit->setSlug("parure-hausse-de-couette");
        $produit->setDescription("Parure housse de couette et taie d’oreiller Dinosaur 100% coton.");
        $produit->setPrix(78,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::PARURE_HAUSSE_DE_COUETTE, $produit);

        $produit = new Produit();
        $produit->setNom("Dessus de lit Sam Faiers");
        $produit->setSlug("dessous-de-lit-sam-faiers");
        $produit->setDescription("Dessus de lit Sam Faiers Little Knightley's matelassé pour enfant.");
        $produit->setPrix(120);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::DESSOUS_DE_LIT_SAM_FAIERS, $produit);

        $produit = new Produit();
        $produit->setNom("Tapis Arctic douillet");
        $produit->setSlug("tapis-arctic-douillet");
        $produit->setDescription("Tapis Arctic douillet en fausse fourrure.");
        $produit->setPrix(180);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::TAPIS_ARCTIC_DOUILLET, $produit);

        $produit = new Produit();
        $produit->setNom("Rideaux en valours");
        $produit->setSlug("rideaux-en-valours");
        $produit->setDescription("Rideaux en velours mat.");
        $produit->setPrix(118);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::RIDEAUX_EN_VALOURS, $produit);

        $produit = new Produit();
        $produit->setNom("Tapis super Doux");
        $produit->setSlug("tapis-super-doux");
        $produit->setDescription("Tapis super doux dégradé pour enfant.");
        $produit->setPrix(140);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::TAPIS_SUPER_DOUX, $produit);

        $produit = new Produit();
        $produit->setNom("Lot de Embrasses de Rideau");
        $produit->setSlug("lot-de-embrasses-de-rideaux");
        $produit->setDescription("Lot de 2 embrasses de rideaux à motif abeille.");
        $produit->setPrix(40);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::LOT_DE_EMBRASSES_DE_RIDEAUX, $produit);

        $produit = new Produit();
        $produit->setNom("Métallisé Rayé Rideaux");
        $produit->setSlug("metallise-raye-rideaux");
        $produit->setDescription("Métallisé Rayé Rideaux.");
        $produit->setPrix(140);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::METALLISE_RAYE_RIDEAUX, $produit);

        $produit = new Produit();
        $produit->setNom("Bronx Salvage Abstract Runner");
        $produit->setSlug("bronx-salvage-abstract-runner");
        $produit->setDescription("Bronx Salvage Abstract Runner.");
        $produit->setPrix(180);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::BRONX_SALVAGE_ABSTRACT_RUNNER, $produit);

        $produit = new Produit();
        $produit->setNom("Coussin en Valours");
        $produit->setSlug("coussin-en-valours");
        $produit->setDescription("Coussin en velours mat.");
        $produit->setPrix(38);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::LINGE_DE_MAISON));
        $manager->persist($produit);
        $this->addReference(self::COUSSIN_EN_VALOURS, $produit);

        //=======================Produits de Catégorie de Art de maison ============//
        $produit = new Produit();
        $produit->setNom("Art de la table");
        $produit->setSlug("art-de-la-table");
        $produit->setDescription("Prenez du plaisir à recevoir et réaliser de jolies tablées pour vos convives avec notre 
                                  large sélection d’assiettes.");
        $produit->setPrix(39,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::ART_DE_LA_TABLE, $produit);

        $produit = new Produit();
        $produit->setNom("Bronx");
        $produit->setSlug("bronx");
        $produit->setDescription("Vaisselle irrésistible pour la plus belle table pour tous les jours.");
        $produit->setPrix(130);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::BRONX, $produit);

        $produit = new Produit();
        $produit->setNom("Motif Coeur");
        $produit->setSlug("motif-coeur");
        $produit->setDescription("Motif cœur.");
        $produit->setPrix(38);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::MOTIF_COEUR, $produit);

        $produit = new Produit();
        $produit->setNom("Nappe Halloween");
        $produit->setSlug("nappe-halloween");
        $produit->setDescription("Nappe Halloween Gonk Wipe Clean.");
        $produit->setPrix(75);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::NAPPE_HALLOWEEN, $produit);

        $produit = new Produit();
        $produit->setNom("Sets de Table");
        $produit->setSlug("sets-de-table");
        $produit->setDescription("Sets de table à pompons.");
        $produit->setPrix(33);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::SETS_DE_TABLE, $produit);

        $produit = new Produit();
        $produit->setNom("Coussin en Velours Art");
        $produit->setSlug("coussin-en-velours-art");
        $produit->setDescription("Coussin en velours.");
        $produit->setPrix(28);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::COUSSIN_EN_VELOURS_ART, $produit);

        $produit = new Produit();
        $produit->setNom("Vernis Logan");
        $produit->setSlug("vernis-logan");
        $produit->setDescription("Vernis Logan Reactive.");
        $produit->setPrix(105);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::VERNIS_LOGAN, $produit);

        $produit = new Produit();
        $produit->setNom("Similicuir Réversible");
        $produit->setSlug("similicuir-reversible");
        $produit->setDescription("Similicuir réversible.");
        $produit->setPrix(52);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::SIMILICUIR_REVERSIBLE, $produit);
        
        $produit = new Produit();
        $produit->setNom("Mugs Bronx");
        $produit->setSlug("mugs-bronx");
        $produit->setDescription("Mugs Bronx.");
        $produit->setPrix(42);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::MUGS_BRONX, $produit);

        $produit = new Produit();
        $produit->setNom("Porte Bouteille de Botte");
        $produit->setSlug("porte-bouteille-de-botte");
        $produit->setDescription("Porte-bouteille de botte de sorcière.");
        $produit->setPrix(59);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::ART_DE_LA_TABLE));
        $manager->persist($produit);
        $this->addReference(self::PORTE_BOUTEILLE_DE_BOTTE, $produit);

        //======================Produits de Catégorie de Rangement ===============//
        $produit = new Produit();
        $produit->setNom("Unité de rangement");
        $produit->setSlug("unite-de-rangement");
        $produit->setDescription("Retrouvez nos paniers en paille tressée, en tissu ou en métal,  des corbeilles en fibres 
                                  naturelles, des paniers de plage... pour ranger et décorer votre intérieur.");
        $produit->setPrix(69,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::UNITE_DE_RANGEMENT, $produit);

        $produit = new Produit();
        $produit->setNom("Caddy D'angle");
        $produit->setSlug("caddy-d-angle");
        $produit->setDescription("Caddy d’angle.");
        $produit->setPrix(83);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::CADDY_D_ANGLE, $produit);

        $produit = new Produit();
        $produit->setNom("Crochets Malvern");
        $produit->setSlug("crochets-malvern");
        $produit->setDescription("Crochets Malvern.");
        $produit->setPrix(106);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::CROCHETS_MALVERN, $produit);

        $produit = new Produit();
        $produit->setNom("Boite à Bijoux");
        $produit->setSlug("boite-a-bijoux");
        $produit->setDescription("Boîte à bijoux en similicuir.");
        $produit->setPrix(52);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::BOITE_A_BIJOUX, $produit);

        $produit = new Produit();
        $produit->setNom("Meuble à Chaussures");
        $produit->setSlug("meuble-a-chaussures");
        $produit->setDescription("Meuble à chaussures Bronx.");
        $produit->setPrix(120);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::MEUBLE_A_CHAUSSURES, $produit);

        $produit = new Produit();
        $produit->setNom("Placard d'Angle");
        $produit->setSlug("placard-d-angle");
        $produit->setDescription("Placard d'angle Bronx imitation chêne.");
        $produit->setPrix(140);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::PLACARD_D_ANGLE, $produit);

        $produit = new Produit();
        $produit->setNom("Panier Bébé");
        $produit->setSlug("panier-bebe");
        $produit->setDescription("Panier Bébé Caddy.");
        $produit->setPrix(43);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::PANIER_BEBE, $produit);

        $produit = new Produit();
        $produit->setNom("Etagère Umbra Bellwood");
        $produit->setSlug("etagere-umbra-bellwood");
        $produit->setDescription("Étagère Umbra Bellwood autoportante à 3 niveaux.");
        $produit->setPrix(140);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::ETAGERE_UMBRA_BELLWOOD, $produit);

        $produit = new Produit();
        $produit->setNom("Porte Chaussures");
        $produit->setSlug("porte-chaussures");
        $produit->setDescription("Porte-chaussures compact Joseph Joseph Shoe-In Ecru.");
        $produit->setPrix(38);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::PORTE_CHAUSSURES, $produit);

        $produit = new Produit();
        $produit->setNom("Porte Monteau");
        $produit->setSlug("porte-monteau");
        $produit->setDescription("Porte-manteau en bois Umbra Flapper.");
        $produit->setPrix(130);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::RANGEMENT));
        $manager->persist($produit);
        $this->addReference(self::PORTE_MONTEAU, $produit);
        
        //=======================Produits de Catégorie de Jardin===============//
        $produit = new Produit();
        $produit->setNom("Panier jardin");
        $produit->setSlug("panier-jardin");
        $produit->setDescription("Découvrez notre sélection d'accessoires pour décorer votre terrasse ou votre jardin.");
        $produit->setPrix(29,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::PANIER_JARDIN, $produit);

        $produit = new Produit();
        $produit->setNom("Meuble en Bambou");
        $produit->setSlug("meuble-en-bambou");
        $produit->setDescription("Aménagez votre extérieur grâce à notre sélection de mobilier de jardin en bambou afin de créer 
                                  un espace convivial et chaleureux pour cet été.");
        $produit->setPrix(160);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::MEUBLE_EN_BAMBOU, $produit);

        $produit = new Produit();
        $produit->setNom("Fauteuil bas Lounge");
        $produit->setSlug("fauteuil-bas-lounge");
        $produit->setDescription("Fauteuil bas lounge en bambou naturel Taman.");
        $produit->setPrix(159);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::FAUTEUIL_BAS_LOUNGE, $produit);

        $produit = new Produit();
        $produit->setNom("Chaise-longue");
        $produit->setSlug("chaise-longue");
        $produit->setDescription("Chaise longue en bambou naturel Taman.");
        $produit->setPrix(219);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::CHAISE_LONGUE, $produit);

        $produit = new Produit();
        $produit->setNom("Bar en Bambou");
        $produit->setSlug("bar-en-bambou");
        $produit->setDescription("Bar en bambou naturel Taman.");
        $produit->setPrix(599);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::BAR_EN_BAMBOU, $produit);

        $produit = new Produit();
        $produit->setNom("Portant à Vêtements");
        $produit->setSlug("portant-a-vetements");
        $produit->setDescription("Portant à vêtements avec étagère en bambou naturel Taman.");
        $produit->setPrix(139);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::PORTANT_A_VETEMENTS, $produit);

        $produit = new Produit();
        $produit->setNom("Table de Jardin");
        $produit->setSlug("table-de-jardin");
        $produit->setDescription("Table de jardin ronde pliante en bambou naturel Taman.");
        $produit->setPrix(129);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::TABLE_DE_JARDIN, $produit);

        $produit = new Produit();
        $produit->setNom("Bibliothèque Jardin");
        $produit->setSlug("bibliotheque-jardin");
        $produit->setDescription("Bibliothèque étagère à poser pliante en bambou naturel Taman.");
        $produit->setPrix(109);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::BIBLIOTHEQUE_JARDIN, $produit);

        $produit = new Produit();
        $produit->setNom("Banc Pliant");
        $produit->setSlug("banc-pliant");
        $produit->setDescription("Banc pliant en bambou naturel Taman.");
        $produit->setPrix(89);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::BANC_PLIANT, $produit);

        $produit = new Produit();
        $produit->setNom("Table Basse");
        $produit->setSlug("table-basse");
        $produit->setDescription("Table basse carrée en bambou naturel Taman.");
        $produit->setPrix(149);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::JARDIN));
        $manager->persist($produit);
        $this->addReference(self::TABLE_BASSE, $produit);

        //========================Produits de Catégorie d'inspirations============//
        $produit = new Produit();
        $produit->setNom("Collection luxe");
        $produit->setSlug("collection-luxe");
        $produit->setDescription("Luxe, calme ... et déco. Dans la chambre créent un espace serein.");
        $produit->setPrix(29,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::COLLECTION_LUXE, $produit);

        $produit = new Produit();
        $produit->setNom("Laura Ashley");
        $produit->setSlug("laura-ashley");
        $produit->setDescription("Découvrez la gamme complète de la marque Laura Ashley");
        $produit->setPrix(129,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::LAURA_ASHLEY, $produit);

        $produit = new Produit();
        $produit->setNom("Catherine Lansfield");
        $produit->setSlug("catherine-lansfield");
        $produit->setDescription("Découvrez la gamme complète de la marque Catherine Lansfield");
        $produit->setPrix(159,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::CATHERINE_LANSFIELD, $produit);
        
        $produit = new Produit();
        $produit->setNom("Furn");
        $produit->setSlug("furn");
        $produit->setDescription("Découvrez la gamme complète de la marque Furn");
        $produit->setPrix(159,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::FURN, $produit);

        $produit = new Produit();
        $produit->setNom("Serviettes");
        $produit->setSlug("serviettes");
        $produit->setDescription("Serviette En Coton Égyptien");
        $produit->setPrix(29,99);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::SERVIETTES, $produit);

        $produit = new Produit();
        $produit->setNom("Rideaux Inspirations");
        $produit->setSlug("rideaux-inspirations");
        $produit->setDescription("Rideaux en Cotton Curtains");
        $produit->setPrix(37);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::RIDEAUX_INSPIRATIONS, $produit);

        $produit = new Produit();
        $produit->setNom("Couvertures");
        $produit->setSlug("couvertures");
        $produit->setDescription("Couverture En Maille Torsadée ");
        $produit->setPrix(129);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::COUVERTURES, $produit);

        $produit = new Produit();
        $produit->setNom("Rangement de Cuisine");
        $produit->setSlug("rangement-de-cuisine");
        $produit->setDescription("3 Pot de pâtes en verre avec couvercle en bois ");
        $produit->setPrix(39);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::RANGEMENT_DE_CUISINE, $produit);

        $produit = new Produit();
        $produit->setNom("Tapis de Bain Inspiration");
        $produit->setSlug("tapis-de-bain-inspiration");
        $produit->setDescription("Tapis de bain Orla Kiely motif tournesols");
        $produit->setPrix(83);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::TAPIS_DE_BAIN_INSPIRATION, $produit);

        $produit = new Produit();
        $produit->setNom("Etagère Murale pour Poêles");
        $produit->setSlug("etagere-murale-pour-poeles");
        $produit->setDescription("Étagère murale pour poêles Bronx");
        $produit->setPrix(106);
        $produit->setIsActive(true);
        $produit->setCategorie($this->getReference(CategorieFixtures::INSPIRATIONS));
        $manager->persist($produit);
        $this->addReference(self::ETAGERE_MURALE_POUR_POELES, $produit);


        $manager->flush();
    }
}
