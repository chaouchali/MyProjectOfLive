<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/liens-utiles')]
class OthersController extends AbstractController
{
    #[Route('/blog', name: 'app_others_blog')]
    public function blog(): Response
    {
        return $this->render('others/blog.html.twig', [
            'controller_name' => 'OthersController',
        ]);
    }

    #[Route('/termes-et-conditions', name: 'app_others_termes-et-conditions')]
    public function TermesEtConditions(): Response
    {
        return $this->render('others/termes-et-conditions.html.twig', [
            'controller_name' => 'OthersController',
        ]);
    }

    #[Route('/contact', name: 'app_others_contact')]
    public function contact(Request $req , ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $contact = new Contact();
        $form= $this->createForm(ContactType::class, $contact, [
            'action' => $this->generateUrl('app_others_contact'),
            'method' => 'POST',
        ]);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
           $em->persist($contact);
           $em->flush();
           $this->addFlash('success', 'Votre message a été envoyé. Merci!');
            return $this->redirectToRoute('app_others_contact');
        }
        return $this->render('others/contact.html.twig', [
            'controller_name' => 'OthersController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/à-propos-de-nous', name: 'app_others_À-propos-de-nous')]
    public function ÀProposDeNous(): Response
    {
        return $this->render('others/à-propos-de-nous.html.twig', [
            'controller_name' => 'OthersController',
        ]);
    }
    

    #[Route('/faq', name: 'app_others_faq')]
    public function faq(): Response
    {
        return $this->render('others/faq.html.twig', [
            'controller_name' => 'OthersController',
        ]);
    }

    #[Route('/comment-ça-fonctionne', name: 'app_others_CommentçaFonctionne')]
    public function CommentçaFonctionne(): Response
    {
        return $this->render('others/CommentçaFonctionne.html.twig', [
            'controller_name' => 'OthersController',
        ]);
    }

    #[Route('/tarifs', name: 'app_others_Tarifs')]
    public function Tarifs(): Response
    {
        return $this->render('others/tarifs.html.twig', [
            'controller_name' => 'OthersController',
        ]);
    }

}
