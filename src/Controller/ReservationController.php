<?php


namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Event;
use App\Entity\Performance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="app_reservation")
     */
    public function index()
    {
        return $this->render('visiteur/reservation.html.twig');
    }
}
