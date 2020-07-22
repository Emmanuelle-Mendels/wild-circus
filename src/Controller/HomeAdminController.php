<?php


namespace App\Controller;

use App\Entity\Event;
use App\Entity\Performance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeAdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index()
    {
        return $this->render('base_admin.html.twig');
    }
}
