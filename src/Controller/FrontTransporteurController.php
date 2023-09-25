<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontTransporteurController extends AbstractController
{
    #[Route('/transporteur', name: 'app_front_transporteur')]
    public function index(): Response
    {
        
     
        // $form =$this->createForm(CommandeType::class, data: null, [
        //     'user' => $this->getUser()
        // ])
        return $this->render('front_commande/index.html.twig', [
            // 'form' => $form->createView(),
        ]);
    }
}
