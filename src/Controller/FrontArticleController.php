<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontArticleController extends AbstractController
{
    #[Route('/article', name: 'app_front_article')]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('front_article/index.html.twig', [
            'articles' => $articleRepository->findBy([], ["nom"=>"ASC"]),
        ]);
    }

    #[Route('/article/{slug}', name: 'app_front_article_show')]
    public function show($slug, ArticleRepository $articleRepository): Response
    {
        return $this->render('front_article/show.html.twig', [
            'article' => $articleRepository->findOneBy(["slug"=>$slug]),
        ]);
    }
}
