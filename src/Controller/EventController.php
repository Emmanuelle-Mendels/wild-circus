<?php


namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Event;
use App\Entity\Performance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="app_event")
     */
    public function index()
    {
        $events = $this->getDoctrine()
            ->getRepository(Artist::class)
            ->findAll();

        return $this->render('visiteur/event.html.twig', [
            'events' => $events,
        ]);
    }
}
