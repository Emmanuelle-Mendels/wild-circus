<?php


namespace App\Controller;

use App\Entity\Event;
use App\Entity\Performance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {
        $events = $this->getDoctrine()
            ->getRepository(Event::class)
            ->findBy([], ['date' => 'desc'], 3);

        $performances = $this->getDoctrine()
            ->getRepository(Performance::class)
            ->findBy(['focus' => true], ['id' => 'DESC'], 3);

        return $this->render('home/index.html.twig', [
            'events' => $events,
            'performances' => $performances,
        ]);
    }
}
