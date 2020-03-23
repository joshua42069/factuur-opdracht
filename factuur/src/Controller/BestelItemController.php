<?php

namespace App\Controller;

use App\Entity\BestelItem;
use App\Form\BestelItemType;
use App\Repository\BestelItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bestel/item")
 */
class BestelItemController extends AbstractController
{
    /**
     * @Route("/", name="bestel_item_index", methods={"GET"})
     */
    public function index(BestelItemRepository $bestelItemRepository): Response
    {
        return $this->render('bestel_item/index.html.twig', [
            'bestel_items' => $bestelItemRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bestel_item_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bestelItem = new BestelItem();
        $form = $this->createForm(BestelItemType::class, $bestelItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bestelItem);
            $entityManager->flush();

            return $this->redirectToRoute('bestel_item_index');
        }

        return $this->render('bestel_item/new.html.twig', [
            'bestel_item' => $bestelItem,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bestel_item_show", methods={"GET"})
     */
    public function show(BestelItem $bestelItem): Response
    {
        return $this->render('bestel_item/show.html.twig', [
            'bestel_item' => $bestelItem,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bestel_item_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BestelItem $bestelItem): Response
    {
        $form = $this->createForm(BestelItemType::class, $bestelItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bestel_item_index');
        }

        return $this->render('bestel_item/edit.html.twig', [
            'bestel_item' => $bestelItem,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bestel_item_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BestelItem $bestelItem): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bestelItem->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bestelItem);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bestel_item_index');
    }
}
