<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\InfoCoach;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact/", name="app_contact")
     * @return Response
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from($contact->getEmail())
                ->to('wild-circus@wild.com')
                ->subject('wild-circus.com : un nouveau message du formulaire de contact')
                ->html($this->renderView('email/contact.html.twig', [
                    'contact' => $contact
                ]));

            $mailer->send($email);
            $this->addFlash('success', 'Votre message a bien été envoyé.');
            return $this->redirectToRoute('app_contact');
        }
        return $this->render('visiteur/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
