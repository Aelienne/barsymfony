<?php

namespace App\Controller;

use App\Entity\Bar;
use App\Form\BarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BarController extends AbstractController
{
    #[Route('/bar', name: 'app_bar')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        $bar = $entityManager->getRepository(Bar::class)->findAll();

        if (!$bar) {
            throw $this->createNotFoundException('The bar does not exist');
        }
        return $this->render('bar/bar_list.html.twig', ['bars' => $bar]);
    }
    #[Route('bar/new', name: 'app_bar_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bar = new Bar();
        $form = $this->createForm(BarType::class, $bar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bar);
            $entityManager->flush();

            return $this->redirectToRoute('app_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bar_controller_crud/new.html.twig', [
            'bar' => $bar,
            'form' => $form,
        ]);
    }
}
