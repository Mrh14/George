<?php

namespace App\Controller;

use App\Entity\Interlocuteurs;
use App\Form\InterlocuteursType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/interlocuteurs')]
class InterlocuteursController extends AbstractController
{
    #[Route('/', name: 'interlocuteurs_index', methods: ['GET'])]
    public function index(): Response
    {
        $interlocuteurs = $this->getDoctrine()
            ->getRepository(Interlocuteurs::class)
            ->findAll();

        return $this->render('interlocuteurs/index.html.twig', [
            'interlocuteurs' => $interlocuteurs,
        ]);
    }

    #[Route('/new', name: 'interlocuteurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $interlocuteur = new Interlocuteurs();
        $form = $this->createForm(InterlocuteursType::class, $interlocuteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($interlocuteur);
            $entityManager->flush();

            return $this->redirectToRoute('interlocuteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interlocuteurs/new.html.twig', [
            'interlocuteur' => $interlocuteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'interlocuteurs_show', methods: ['GET'])]
    public function show(Interlocuteurs $interlocuteur): Response
    {
        return $this->render('interlocuteurs/show.html.twig', [
            'interlocuteur' => $interlocuteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'interlocuteurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Interlocuteurs $interlocuteur): Response
    {
        $form = $this->createForm(InterlocuteursType::class, $interlocuteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interlocuteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interlocuteurs/edit.html.twig', [
            'interlocuteur' => $interlocuteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'interlocuteurs_delete', methods: ['POST'])]
    public function delete(Request $request, Interlocuteurs $interlocuteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interlocuteur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($interlocuteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('interlocuteurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
