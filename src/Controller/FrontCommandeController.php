<?php

namespace App\Controller;

use DateTimeImmutable;
use DateTimeInterface;
use App\Entity\Article;
use App\Entity\Commande;
use App\Form\CommandeType;
use App\Repository\AdresseRepository;
use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class FrontCommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_front_commande')]

    public function add(SessionInterface $session, ProduitRepository $produitRepository,  
    EntityManagerInterface  $em, AdresseRepository $adresseRepository ): Response
    {   
        $this->denyAccessUnlessGranted('ROLE_USER');
          
        if (!$this->getUser()){
            return $this->redirectToRoute('app_login');
        }
      

        $panier = $session->get('panier', []);
        $articles = [];
        $total = 0;
        $user = $this->getUser();
        $adresses =$adresseRepository->findByRue($user);
        $defaultAdresse = $adresseRepository->findOneByRue($user);
        $id = 0;
        foreach ($adresses as $key => $adresse){
           if($adresse === $defaultAdresse){
            $id = $key;
           }
        }
        $group = [
            'adresses' => $adresses,
             'keyDefaultAdresse' => $id
        ];
        $form = $this->createForm(CommandeType::class, null, ['group' => $group]);
        foreach($panier as $id =>$quantite){
           $produit = $produitRepository->find($id);
           $prix = $produit->getprix();
           if($produit->getCommande()){
             $prix = $produit->getPrix() - ($produit->getPrix() * $produit->getCommande() /100);

           }
           $articles[] = [
            "produit" => $produit,
             "quantite" => $quantite,
             "prix" => $prix
           ];
           $total += $prix * $quantite;
      }
       return $this->render('front_commande/index.html.twig', [
         'form' => $form->createView(),
         'articles' => $articles,
         'total' => $total,
         'user' => $user

       ]);
       }
       #[Route('/commande/verify', name: 'app_front_commande_verify')]

       public function verify(SessionInterface $session, ProduitRepository $produitRepository, Request $request, EntityManagerInterface $entityManagerInterface)
       {
         $panier = $session->get('panier');
         $total = 0;
         $user = $this->getUser();
         $dateTime = new DateTimeImmutable('new');
         $reference = $dateTime->format('dmY') . '-' . uniqid();
         $form = $this->createForm(CommandeType::class, null,);
         $form->handleRequest($request);

         if($form->isSubmitted() && $form->isValid()){
            $commande = new Commande();
            $adresse = $form->getData()['adresse'];
            $total = 0;
            foreach($panier as $id => $quantite){
                $produit = $produitRepository->find($id);
                $prix = $produit->getPrix();
                if($produit->getCommande()){
                    $prix = $produit->getPrix() - ($produit->getPrix() * $produit->getCommande() /100);
                }

                $article = new Article();
                $article->setProduit($produit);
                $article->setQuantite($quantite);
                $article->setPrix($prix);

                $entityManagerInterface->persist($article);

                $commande->addArticle($article);

                $total += $prix * $quantite;                               
            }

            $commande->setReference($reference);
            $commande->setAdresse($adresse);
            $commande->setUser($user);
            $commande->setCreatedAt($dateTime);
            $commande->setPrixTotal($total);
            $commande->setIsPaid(false);

            $entityManagerInterface->persist($commande);
            $entityManagerInterface->flush();

            return $this->render('front_commande/verify.html.twig', [
                'commande'=> $commande,
            ]);

        }
        return $this->render('front_user/index.html.twig',[
            'user' => $user,
        ]);
       }
       #[Route('/commande/create-session-stripe/{id}', name: 'payement_stripe')]
       public function payementStripe(CommandeRepository $commandeRepository, $id, UrlGeneratorInterface $urlGenerator): RedirectResponse
       {
         $commande = $commandeRepository->find($id);
         if(!$commande){
            return $this->redirectToRoute('app_front_panier_index');
         }
         $articlesStripe =[];
         foreach($commande->getArticle() as $article){
          $articlesStripe[] = [
            'prix_date' => [
             'currency' => 'eur',
            ]
            ];
         }
       }

    
    }
