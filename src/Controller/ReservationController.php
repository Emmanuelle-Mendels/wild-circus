<?php


namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Price;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="app_reservation", methods={"GET","POST"})
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {

        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();
            $this->addFlash('success', 'La réservation a bien été effectuée');

            $email = (new Email())
                ->from('wild-circus@wild.com')
                ->to($reservation->getEmail())
                ->subject('Confirmation de votre réservation')
                ->html( $content = $this->renderView('email/confirmation.html.twig', ['reservation' => $reservation]));
            $mailer->send($email);
            return $this->redirectToRoute('app_index');
        }
        return $this->render('visiteur/reservation.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }
}
