<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontPanierController extends AbstractController
{
    #[Route('/panier', name: 'app_front_panier')]
    public function index(SessionInterface $session, ProduitRepository $produitRepository)

    {     $panier = $session->get("panier", []);
         
        // on crée les données
        $dataPanier = [];
        $total = 0;

        foreach($panier as $id => $quantite){
            $produit = $produitRepository->find($id);
            $dataPanier[] = [
                "produit" => $produit,
                "quantite" => $quantite
            ];

            $total += $produit->getPrix() * $quantite;
        }


        return $this->render('front_panier/index.html.twig', compact("dataPanier", "total"));
    }
    #[Route('panier/add/{id}', name: 'app_front_panier_add')]
    public function add($id, SessionInterface $session, ProduitRepository $produit): Response
    {
       //    on récupère le panier actuel 
    $panier = $session->get("panier", []);
    // $id = $produit->getId();
    if(!empty($panier[$id])){
        $panier[$id]++;
     }else{
        $panier[$id] = 1;

     }
 // on sauvgarde dans la session
   $session->set("panier", $panier);
        // dd($session);
  
  
    return $this->redirectToRoute("app_front_panier");
    
    }

    #[Route('/remove/{id}', name: 'app_front_panier_remove')]
    public function remove($id, SessionInterface $session, ProduitRepository $produit): Response
    {
       //    on récupère le panier actuel 
    $panier = $session->get("panier", []);
    // $id = $produit->getId();
    if(!empty($panier[$id])){
        if($panier[$id] > 1){
            $panier[$id]--;
        }else{
            unset($panier[$id]);
        }
      
     }
 // on sauvgarde dans la session
   $session->set("panier", $panier);
        // dd($session);
  
  
    return $this->redirectToRoute("app_front_panier");
    
    }

    #[Route('/delete/{id}', name: 'app_front_panier_delete')]
    public function delete($id, SessionInterface $session, ProduitRepository $produit): Response
    {
       //    on récupère le panier actuel 
    $panier = $session->get("panier", []);
    // $id = $produit->getId();

    if(!empty($panier[$id])){
         unset($panier[$id]);
           
        }
 // on sauvgarde dans la session
   $session->set("panier", $panier);
        // dd($session);
  
  
    return $this->redirectToRoute("app_front_panier");
    
    }
 
    #[Route('/delete', name: 'app_front_panier_delete_all')]
    public function deleteAll(SessionInterface $session): Response
    {
       
       $session->set("panier", []);
        // dd($session);
  
  
    return $this->redirectToRoute("app_front_panier");
    
    }

    
}
