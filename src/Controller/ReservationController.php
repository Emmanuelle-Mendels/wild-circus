<?php


namespace App\Controller;

use App\Entity\Price;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="app_reservation")
     */
    public function index()
    {
        $prices = $this->getDoctrine()
            ->getRepository(Price::class)
            ->findBy([], ['category' => 'asc']);
        return $this->render('visiteur/reservation.html.twig', [
            'prices' => $prices,
        ]);

    }
}
