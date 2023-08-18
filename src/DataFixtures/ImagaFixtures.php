<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\DataFixtures\ProduitFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImagaFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        //================images de produits de catégorie nouveautés ===================//
        $image = new Image();
        $image->setImageName('porte-monteau-mural.webp');
        $image->setProduit($this->getReference(ProduitFixtures::PORTE_MONTEAU_MURAL));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('verrerie.webp');
        $image->setProduit($this->getReference(ProduitFixtures::VERRERIE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('rideaux-nouveautes.webp');
        $image->setProduit($this->getReference(ProduitFixtures::RIDEAUX_NOUVEAUTES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('porte-serviettes.webp');
        $image->setProduit($this->getReference(ProduitFixtures::PORTE_SERVIETTES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('rangement-douche.webp');
        $image->setProduit($this->getReference(ProduitFixtures::RANGEMENT_DOUCHE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('coussin.webp');
        $image->setProduit($this->getReference(ProduitFixtures::COUSSIN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('service-vaisselle.webp');
        $image->setProduit($this->getReference(ProduitFixtures::SERVICE_VAISSELLE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('organisateur-de-bijoux.webp');
        $image->setProduit($this->getReference(ProduitFixtures::ORGANISATEUR_DE_BIJOUX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('organisateur-multi-niveaux.webp');
        $image->setProduit($this->getReference(ProduitFixtures::ORGANISATEUR_MULTI_NIVEAUX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('casier-a-vin.webp');
        $image->setProduit($this->getReference(ProduitFixtures::CASIER_A_VIN));
        $image->setRankOrder(1);
        $manager->persist($image);

        //==================== images de produits de catégorie de mobilier=================//
        $image = new Image();
        $image->setImageName('canape-mobilier.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::CANAPE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('armoire-mobilier.webp');
        $image->setProduit($this->getReference(ProduitFixtures::ARMOIRE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('sous-meuble-de-lavabo.webp');
        $image->setProduit($this->getReference(ProduitFixtures::SOUS_MEUBLE_DE_LAVABO));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('fauteuil-mobilier.webp');
        $image->setProduit($this->getReference(ProduitFixtures::FAUTEUIL));
        $image->setRankOrder(1);
        $manager->persist($image);
        
        $image = new Image();
        $image->setImageName('etagere-murale-mobilier.webp');
        $image->setProduit($this->getReference(ProduitFixtures::ETAGERE_MURALE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('canape-salon-mobilier.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::CANAPE_SALON));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('table-salon-mobilier.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::TABLE_SALON));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('chambre-enfant-mobilier.webp');
        $image->setProduit($this->getReference(ProduitFixtures::CHAMBRE_POUR_ENFANT));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('chambre-mobilier.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::CHAMBRE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('bibliotheque-mobilier.webp');
        $image->setProduit($this->getReference(ProduitFixtures::BIBLIOTHEQUE));
        $image->setRankOrder(1);
        $manager->persist($image);

        //====================images de produits de catégorie de décoration================//
        $image = new Image();
        $image->setImageName('armoire-murale-decoration.webp');
        $image->setProduit($this->getReference(ProduitFixtures::ARMOIRE_MURALE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('deco-murales.webp');
        $image->setProduit($this->getReference(ProduitFixtures::DECO_MURALES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('deco-chambre.webp');
        $image->setProduit($this->getReference(ProduitFixtures::DECO_CHAMBRE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('meroir-murale-deco.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::MEROIR_MURALE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('tapis-de-bain-deco.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::TAPIS_DE_BAIN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('collection-deco.webp');
        $image->setProduit($this->getReference(ProduitFixtures::COLLECTION_DECO));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('cadre-deco.webp');
        $image->setProduit($this->getReference(ProduitFixtures::CADRE_DECO));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('chemin-de-table.webp');
        $image->setProduit($this->getReference(ProduitFixtures::CHEMIN_DE_LA_TABLE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('jete-en-peluche.webp');
        $image->setProduit($this->getReference(ProduitFixtures::JETE_EN_PELUCHE));
        $image->setRankOrder(1);
        $manager->persist($image);
        
        $image = new Image();
        $image->setImageName('long-plaid-deco.webp');
        $image->setProduit($this->getReference(ProduitFixtures::LONG_PLAID));
        $image->setRankOrder(1);
        $manager->persist($image);

        //===========================images de produits de catégorie linge de maison===//
        $image = new Image();
        $image->setImageName('couette-linge-de-maison.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::COUETTES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('parure-hausse-de-couette.webp');
        $image->setProduit($this->getReference(ProduitFixtures::PARURE_HAUSSE_DE_COUETTE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('dessus-de-lit-sam-faiers.webp');
        $image->setProduit($this->getReference(ProduitFixtures::DESSOUS_DE_LIT_SAM_FAIERS));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('tapis-arctic-douillet.webp');
        $image->setProduit($this->getReference(ProduitFixtures::TAPIS_ARCTIC_DOUILLET));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('rideaux-en-valours.webp');
        $image->setProduit($this->getReference(ProduitFixtures::RIDEAUX_EN_VALOURS));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('tapis-super-doux.webp');
        $image->setProduit($this->getReference(ProduitFixtures::TAPIS_SUPER_DOUX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('lot-de-embrasses-de-rideau.webp');
        $image->setProduit($this->getReference(ProduitFixtures::LOT_DE_EMBRASSES_DE_RIDEAUX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('metallise-raye-rideaux.webp');
        $image->setProduit($this->getReference(ProduitFixtures::METALLISE_RAYE_RIDEAUX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('bronx-salvage-abstract-runner.webp');
        $image->setProduit($this->getReference(ProduitFixtures::BRONX_SALVAGE_ABSTRACT_RUNNER));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('coussin-en-valours.webp');
        $image->setProduit($this->getReference(ProduitFixtures::COUSSIN_EN_VALOURS));
        $image->setRankOrder(1);
        $manager->persist($image);

        //==============images de produits de catégories de l'art de la table========//
        $image = new Image();
        $image->setImageName('art-de-la-table.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::ART_DE_LA_TABLE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('bronx.webp');
        $image->setProduit($this->getReference(ProduitFixtures::BRONX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('motif-coeur.webp');
        $image->setProduit($this->getReference(ProduitFixtures::MOTIF_COEUR));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('nappe-halloween.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::NAPPE_HALLOWEEN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('sets-de-table.webp');
        $image->setProduit($this->getReference(ProduitFixtures::SETS_DE_TABLE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('coussin-en-velours-art.webp');
        $image->setProduit($this->getReference(ProduitFixtures::COUSSIN_EN_VELOURS_ART));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('vernis-logan.webp');
        $image->setProduit($this->getReference(ProduitFixtures::VERNIS_LOGAN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('similicuir-reversible.webp');
        $image->setProduit($this->getReference(ProduitFixtures::SIMILICUIR_REVERSIBLE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('mugs-bronx.webp');
        $image->setProduit($this->getReference(ProduitFixtures::MUGS_BRONX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('porte-bouteille-botte.webp');
        $image->setProduit($this->getReference(ProduitFixtures::PORTE_BOUTEILLE_DE_BOTTE));
        $image->setRankOrder(1);
        $manager->persist($image);

        //==============images de produits de catégories de rangements===========//
        $image = new Image();
        $image->setImageName('unite-de-rangement.webp');
        $image->setProduit($this->getReference(ProduitFixtures::UNITE_DE_RANGEMENT));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('caddy-d-angle.webp');
        $image->setProduit($this->getReference(ProduitFixtures::CADDY_D_ANGLE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('crochets-malvern.webp');
        $image->setProduit($this->getReference(ProduitFixtures::CROCHETS_MALVERN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('boite-a-bijoux.webp');
        $image->setProduit($this->getReference(ProduitFixtures::BOITE_A_BIJOUX));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('meuble-a-chaussures.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::MEUBLE_A_CHAUSSURES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('placard-d-angle.webp');
        $image->setProduit($this->getReference(ProduitFixtures::PLACARD_D_ANGLE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('panier-bebe.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::PANIER_BEBE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('etagere-umbra-bellwood.webp');
        $image->setProduit($this->getReference(ProduitFixtures::ETAGERE_UMBRA_BELLWOOD));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('porte-chaussures.webp');
        $image->setProduit($this->getReference(ProduitFixtures::PORTE_CHAUSSURES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('porte-monteau.webp');
        $image->setProduit($this->getReference(ProduitFixtures::PORTE_MONTEAU));
        $image->setRankOrder(1);
        $manager->persist($image);

        //======================images de produits de catégories de jardin=======//
        $image = new Image();
        $image->setImageName('panier-jardin.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::PANIER_JARDIN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('meuble-en-bambou.webp');
        $image->setProduit($this->getReference(ProduitFixtures::MEUBLE_EN_BAMBOU));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('fauteuil-bas-lounge.webp');
        $image->setProduit($this->getReference(ProduitFixtures::FAUTEUIL_BAS_LOUNGE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('chaise-longue.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::CHAISE_LONGUE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('bar-en-bambou.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::BAR_EN_BAMBOU));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('portant-a-vetements.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::PORTANT_A_VETEMENTS));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('table-de-jardin.webp');
        $image->setProduit($this->getReference(ProduitFixtures::TABLE_DE_JARDIN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('bibliotheque-jardin.webp');
        $image->setProduit($this->getReference(ProduitFixtures::BIBLIOTHEQUE_JARDIN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('banc-pliant.webp');
        $image->setProduit($this->getReference(ProduitFixtures::BANC_PLIANT));
        $image->setRankOrder(1);
        $manager->persist($image);
        
        $image = new Image();
        $image->setImageName('table-basse.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::TABLE_BASSE));
        $image->setRankOrder(1);
        $manager->persist($image);

        //===============images de produits de catégories de inspirations ====//
        $image = new Image();
        $image->setImageName('collection-luxe-inspiration.webp');
        $image->setProduit($this->getReference(ProduitFixtures::COLLECTION_LUXE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('laura-ashley.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::LAURA_ASHLEY));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('catherine-lansfield.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::CATHERINE_LANSFIELD));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('furn.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::FURN));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('serviettes.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::SERVIETTES));
        $image->setRankOrder(1);
        $manager->persist($image);
        
        $image = new Image();
        $image->setImageName('rideaux-inspirations.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::RIDEAUX_INSPIRATIONS));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('couvertures.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::COUVERTURES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('rangement-de-cuisine.jpg');
        $image->setProduit($this->getReference(ProduitFixtures::RANGEMENT_DE_CUISINE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('tapis-de-bain.webp');
        $image->setProduit($this->getReference(ProduitFixtures::TAPIS_DE_BAIN_INSPIRATION));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('etagere-murale-pour-poeles.webp');
        $image->setProduit($this->getReference(ProduitFixtures::ETAGERE_MURALE_POUR_POELES));
        $image->setRankOrder(1);
        $manager->persist($image);

        $manager->flush();
    }
    public function getDependencies():array
    {
        return [
            ProduitFixtures::class
        ];
    }
}
