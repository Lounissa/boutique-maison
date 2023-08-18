<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontUserController extends AbstractController
{
    #[Route('/user', name: 'app_front_user')]
    public function index(): Response
    {

        // on récupère l'utilisateur connecté
        $user = $this->getUser();
        // on crée un formulaire de User avec les datas du user connecté et on le passe à la vue
        $form = $this->createForm(UserType::class, $user);
        return $this->render('front_user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
