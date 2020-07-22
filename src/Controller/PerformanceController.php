<?php


namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Event;
use App\Entity\Performance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PerformanceController extends AbstractController
{
    /**
     * @Route("/performance", name="app_performance")
     */
    public function index()
    {
        $performances = $this->getDoctrine()
            ->getRepository(Performance::class)
            ->findBy([], ['Name' => 'ASC']);

        return $this->render('visiteur/performance.html.twig', [
            'performances' => $performances,
        ]);
    }
}
