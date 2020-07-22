<?php


namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Event;
use App\Entity\Faq;
use App\Entity\Performance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FaqController extends AbstractController
{
    /**
     * @Route("/faq", name="app_faq")
     */
    public function index()
    {
        $faqs = $this->getDoctrine()
            ->getRepository(Faq::class)
            ->findAll();

        return $this->render('visiteur/faq.html.twig', [
            'faqs' => $faqs,
        ]);
    }
}
