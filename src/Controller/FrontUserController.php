<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Favori;
use App\EntityEventListener\UserPersistEventListener;
use App\Form\UserType;
use App\Repository\AdresseRepository;
use App\Repository\FavoriRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FrontUserController extends AbstractController
{   
    #[Route('/adresses/add', methods: ['POST'])]
      public function addAdresse(Request $request, AdresseRepository $adresseRepository, EntityManagerInterface $entityManager)
      {
       $user = $this->getUser();
       $adresse = $adresseRepository->find($request->get('adresses'));
       switch($request->request->get('action')){
        case 'add' :
            $adresse = new Adresse();
            $entityManager->persist($adresse);
            break;
            case 'remove': 
                $adresse = $adresseRepository->findOneBy(['user'=>$user, 'adresse'=>$adresse]);
                $entityManager->remove($adresse);

       }
       $entityManager->flush();
       $this->addFlash("success", 'votre adresse à bien été supprimer');
       return $this->redirectToRoute('app_front_user');
         

      }
   
    #[Route('/favoris/add', methods: ['POST'])]
    public function addFavorite(Request $request, ProduitRepository $produitRepository, EntityManagerInterface $entityManager, 
    FavoriRepository $favoriRepository): JsonResponse
    {
        // On récupère l'utilisateur connecté
        $user = $this->getUser();
        // On récupère le livre à ajouter aux favoris
        $produit = $produitRepository->find($request->request->get('idProduit'));
        // On fait un switch pour savoir si on ajoute ou on supprime le favori
        switch($request->request->get('action')){
            case 'add':
            // On crée un favori
            $favori = new Favori();
            $favori->setUser($user);
            $favori->setProduit($produit);
            // On mémorise le favori
            $entityManager->persist($favori);
            break;
            case 'remove':
            // On récupère le favori
            $favori = $favoriRepository->findOneBy(['user'=>$user, 'produit'=>$produit]);
            // On supprime le favori
            $entityManager->remove($favori);
        }
        // On met en BDD
        $entityManager->flush();
        
        return new JsonResponse(["message"=>"ok"]);
    }

    #[Route('/user', name: 'app_front_user')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface, UserPasswordHasherInterface 
      $userPasswordHasherInterface): Response
    {
        // on récupère l'utilisateur connecté
        $user = $this->getUser();
        // on crée un formulaire de User avec les datas du user connecté et on le passe à la vue
        $form = $this->createForm(UserType::class, $user);
        // on hydrate le user avec les données du formulaire posté potentiellement
        $form->handleRequest($request);
        // on vérifie que le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
            // dd($form->getData()); // Récupére l'instance du User mais pas les propriétés mapped  false
            // dd($form->all()); récupérer toutes les données (champs) du formulaire y compris les mapped false
        // dd($form->get('plainPassword')->getData()); // on récupére la données d'unn champs en particulier y compris les 
        //mapped false
        // dd($request->request->get('plainPassword')); // on récupére la valeur d'un champs non pas dans le formulaire,
        // mais dans la requete. $request->request récupére les données de la requete POST pour la requete GET il faut
        // utiliser $request->http_build_query
        if(!is_null($request->request->get('plainPassword'))){
         $user->setPassword($userPasswordHasherInterface->hashPassword($user, 
         $request->request->get('plainPassword')));
         $entityManagerInterface->persist(($user));
        }
         $entityManagerInterface->flush();
         $this->addFlash("success", 'votre profil à bien été modifié');
         // on redirige vers la page de profil
         return $this->redirectToRoute('app_front_user');
        }
        return $this->render('front_user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
