<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Form\ArtistType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('artist/new', name: 'app_artist_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $artist = new Artist();
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                $pictureFile = $form->get('picture')->getData();
    
                if ($pictureFile) {
                    $newFilename = uniqid().'.'.$pictureFile->guessExtension();
    
                    try {
                        $pictureFile->move(
                            $this->getParameter('artist_pictures_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                    }
    
                    $artist->setPicture($newFilename);
                } else {
                    $this->addFlash('error', 'Please upload a picture.');
                    return $this->redirectToRoute('app_artist_new');
                }
    
            $entityManager->persist($artist);
            $entityManager->flush();

            return $this->redirectToRoute('app_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('artist_controller_crud/new.html.twig', [
            'artist' => $artist,
            'form' => $form,
        ]);
    }
}
