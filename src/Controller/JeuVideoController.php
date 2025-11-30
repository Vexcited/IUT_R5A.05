<?php

namespace App\Controller;

use App\Entity\JeuVideo;
use App\Form\JeuVideoType;
use App\Repository\JeuVideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/jeu_video')]
final class JeuVideoController extends AbstractController
{
    #[Route(name: 'app_jeu_video_index', methods: ['GET'])]
    public function index(JeuVideoRepository $jeuVideoRepository): Response
    {
        return $this->render('jeu_video/index.html.twig', [
            'jeu_videos' => $jeuVideoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_jeu_video_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $jeuVideo = new JeuVideo();
        $form = $this->createForm(JeuVideoType::class, $jeuVideo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Gérer l'upload de l'image
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // Créer un nom de fichier unique et sécurisé
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    // Déplacer le fichier vers le dossier uploads
                    $imageFile->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFilename
                    );

                    // Enregistrer le chemin de l'image dans l'entité
                    $jeuVideo->setImageUrl('/uploads/' . $newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors de l\'upload de l\'image.');
                }
            }

            $entityManager->persist($jeuVideo);
            $entityManager->flush();

            $this->addFlash('success', 'Le jeu vidéo a été créé avec succès.');
            return $this->redirectToRoute('app_jeu_video_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeu_video/new.html.twig', [
            'jeu_video' => $jeuVideo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeu_video_show', methods: ['GET'])]
    public function show(JeuVideo $jeuVideo): Response
    {
        return $this->render('jeu_video/show.html.twig', [
            'jeu_video' => $jeuVideo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_jeu_video_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, JeuVideo $jeuVideo, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(JeuVideoType::class, $jeuVideo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Gérer l'upload de l'image
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // Créer un nom de fichier unique et sécurisé
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    // Déplacer le fichier vers le dossier uploads
                    $imageFile->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFilename
                    );

                    // Supprimer l'ancienne image si elle existe
                    if ($jeuVideo->getImageUrl()) {
                        $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $jeuVideo->getImageUrl();
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    // Enregistrer le chemin de l'image dans l'entité
                    $jeuVideo->setImageUrl('/uploads/' . $newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors de l\'upload de l\'image.');
                }
            }

            $entityManager->flush();

            $this->addFlash('success', 'Le jeu vidéo a été modifié avec succès.');
            return $this->redirectToRoute('app_jeu_video_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeu_video/edit.html.twig', [
            'jeu_video' => $jeuVideo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeu_video_delete', methods: ['POST'])]
    public function delete(Request $request, JeuVideo $jeuVideo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $jeuVideo->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($jeuVideo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_jeu_video_index', [], Response::HTTP_SEE_OTHER);
    }
}
