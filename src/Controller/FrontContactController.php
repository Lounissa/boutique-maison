<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class FrontContactController extends AbstractController
{
    #[Route('/contact', name: 'app_front_contact')]
    public function index(Request $request, EntityManagerInterface $em, MailerInterface $mailerInterface): Response
    {

        // on met en place un formulaire de contact
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        // on hydrate le contact avec les données du formulaire posté potentiellement
        $form->handleRequest($request);
        // on vérifie si le formulaire est posté et qu'il est valide 
        if($form->isSubmitted() && $form->isValid()){
           $em->persist($contact);
           $em->flush();
           // on prepare le  mail texte brut 
        //    $email = (new Email())
        //    ->from($contact->getEmail())
        //    ->to('admin@boutique-maison.com')
        //    ->subject((!is_null($contact->getSujet())) ?$contact->getSujet() : "")
        //    ->text($contact->getMessage());

        // on récupère l'email déclaré dans les paramètres de services.yaml
        $emailContact = $this->getParameter('app.contactEmail');
 
           // on prépare le mail html
           $email = (new TemplatedEmail())
            ->from($contact->getEmail())
            ->to($emailContact)
            ->subject((!is_null($contact->getSujet())) ? $contact->getSujet() : "")
            ->htmlTemplate('front_contact/email.html.twig')
            ->context([
                'qui'=>$contact->getEmail(),
                'sujet'=>$contact->getSujet(),
                'message'=>$contact->getMessage()
            ]);
           // on envoie le mail 
           $mailerInterface->send($email);
           // on ajoute un message flash
           $this->addFlash("success", "Votre message a bien été envoyé");
           // on redirige vers la page d'acceuil
           return $this->redirectToRoute('app_home');
        }
        return $this->render('front_contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
