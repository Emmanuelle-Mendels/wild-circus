<?php


namespace App\Controller;

use App\Entity\Price;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PriceController extends AbstractController
{
    /**
     * @Route("/price", name="app_price")
     */
    public function index()
    {
        $prices = $this->getDoctrine()
            ->getRepository(Price::class)
            ->findBy([], ['category' => 'asc']);
        return $this->render('visiteur/price.html.twig', [
            'prices' => $prices,
        ]);

    }
}
