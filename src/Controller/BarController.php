<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BarController extends AbstractController
{
    #[Route('/bar', name: 'app_bar')]
    public function index(): Response
    {
        return $this->render('bar/bar_list.html.twig', [
            'controller_name' => 'BarController',
        ]);
    }
}
