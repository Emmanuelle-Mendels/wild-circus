<?php


namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Event;
use App\Entity\Performance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="app_artist")
     */
    public function index()
    {
        $artists = $this->getDoctrine()
            ->getRepository(Artist::class)
            ->findBy(['focus' => true], ['Name' => 'ASC']);

        return $this->render('visiteur/artist.html.twig', [
            'artists' => $artists,
        ]);
    }
}
