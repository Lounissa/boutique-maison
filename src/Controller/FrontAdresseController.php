<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontAdresseController extends AbstractController
{
    #[Route('/adresse', name: 'app_front_adresse')]
    public function index(): Response
    {
        return $this->render('front_adresse/index.html.twig', [
            'controller_name' => 'FrontAdresseController',
        ]);
    }
}
