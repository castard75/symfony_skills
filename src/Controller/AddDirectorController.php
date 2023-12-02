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
    public function index( Request $request,EntityManagerInterface $em): Response
    {
                
       $realisateur = new Realisateur();
       $form = $this->createForm(RealisateurType::class,$realisateur);
       $form->handleRequest($request);

     if($form->isSubmitted() && $form->isValid()){
      $acceptedTerms = $request->request->get('acceptedTerms');
          dd($acceptedTerms);   

        $em->persist($realisateur);
        // $em->flush();
        return $this->redirectToRoute('app_home');



     } else {
    
         return $this->render('add_director/index.html.twig', [
         'controller_name' => 'AddDirectorController',
         'form'=> $form]);
     }}}
