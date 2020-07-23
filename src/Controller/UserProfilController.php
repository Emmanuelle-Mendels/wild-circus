<?php


namespace App\Controller;

use App\Entity\InfoCoach;
use App\Entity\User;
use App\Form\ProfilType;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil")
 */
class UserProfilController extends AbstractController
{
    /**
     * @Route("/", name="profil_show", methods={"GET"})
     */
    public function showProfil(ReservationRepository $reservationRepository): Response
    {

        return $this->render('user/profil.html.twig', [
            'reservations' => $reservationRepository->findAll(),

        ]);
    }

    /**
     * @Route("/edit", name="profil_edit", methods={"GET","POST"})
     */

    public function editProfil(Request $request): Response
    {

        $form = $this->createForm(ProfilType::class, $this->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Vos informations ont bien été mises à jour.');


            return $this->redirectToRoute('profil_show');
        }

        return $this->render('user/editProfil.html.twig', [
            'form' => $form->createView(),

        ]);
    }
}
