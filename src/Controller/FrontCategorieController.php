<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontCategorieController extends AbstractController
{
    // fonction qui est appellé par un render controller dans la base et qui  permet de générer un menu déroulant avec les catégories
    public function renderCategorieDropDown(CategorieRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findBy(["isActive"=>true], ["nom"=>"ASC"]);

        return $this->render('front_categorie/_categorie_dropdown.html.twig', [
            'categories' => $categories,
        ]);
    }


    #[Route('/categorie/{slug}', name: 'app_front_categorie')]
    public function index($slug, CategorieRepository $categorieRepository): Response
    {
        if($slug=="categories"){
            return $this->render('front_categorie/index.html.twig', [
                'categories' => $categorieRepository->findBy(["isActive"=>true], ["nom"=>"ASC"]) 
            ]);

        } else{
            $categorie = $categorieRepository->findOneBy(["slug"=>$slug]);
            return $this->render('front_categorie/show.html.twig', [
                'categorie' =>$categorie,
            ]);
        }
      
    }
}
