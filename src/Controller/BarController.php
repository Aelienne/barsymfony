<?php

namespace App\Controller;

use App\Entity\Bar;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
