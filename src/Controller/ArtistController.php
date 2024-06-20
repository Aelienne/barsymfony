<?php

namespace App\Controller;

use App\Entity\Artist;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    #[Route('/artist', name: 'app_artist')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $artist = $entityManager->getRepository(Artist::class)->findAll();

        if (!$artist) {
            throw $this->createNotFoundException('The artist does not exist');
        }

        return $this->render('artist/artist_list.html.twig', ['artists' => $artist]);
    }
}
