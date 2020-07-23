<?php

namespace App\Controller;

use App\Entity\Representation;
use App\Form\RepresentationType;
use App\Repository\RepresentionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/representation")
 */
class AdminRepresentationController extends AbstractController
{
    /**
     * @Route("/", name="representation_index", methods={"GET"})
     */
    public function index(RepresentionRepository $representionRepository): Response
    {
        return $this->render('admin_representation/index.html.twig', [
            'representations' => $representionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="representation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $representation = new Representation();
        $form = $this->createForm(RepresentationType::class, $representation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($representation);
            $entityManager->flush();
            $this->addFlash('success', 'La représentation a bien été ajoutée');

            return $this->redirectToRoute('representation_index');
        }

        return $this->render('admin_representation/new.html.twig', [
            'admin_representation' => $representation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="representation_show", methods={"GET"})
     */
    public function show(Representation $representation): Response
    {
        return $this->render('admin_representation/show.html.twig', [
            'admin_representation' => $representation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="representation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Representation $representation): Response
    {
        $form = $this->createForm(RepresentationType::class, $representation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La représentation a bien été modifiée');

            return $this->redirectToRoute('representation_index');
        }

        return $this->render('admin_representation/edit.html.twig', [
            'admin_representation' => $representation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="representation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Representation $representation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$representation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($representation);
            $entityManager->flush();
            $this->addFlash('success', 'La représentation a bien été supprimée');
        }

        return $this->redirectToRoute('representation_index');
    }
}
