<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RealisateurType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Realisateur;


class AddDirectorController extends AbstractController
{
    #[Route('/add/director', name: 'app_add_director')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {

        $realisateur = new Realisateur();
        $form = $this->createForm(RealisateurType::class, $realisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->get('acceptedTerms')->getData()) {
                $em->persist($realisateur);
                $em->flush();
                $this->addFlash('success', 'Realisateur ajouté avec succès');
                return $this->redirectToRoute('app_home');
            } else {
                $this->addFlash('error', 'Vous devez accepter les conditions');
            }

        }

            return $this->render('add_director/index.html.twig', [
                'controller_name' => 'AddDirectorController',
                'form' => $form]);

    }

}
