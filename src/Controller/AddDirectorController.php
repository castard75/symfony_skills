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
    // le code n'est pas indenté // le controller ne sert pas à faire des enregistrements en base de données
$realisateur = new Realisateur();
$form = $this->createForm(RealisateurType::class,$realisateur);
$form->handleRequest($request);

if($form->isSubmitted() && $form->isValid()){
// il manque la vérification de la condition  que le realsateur ai accepté les conditions avant de l'enregistrer en base de données
$em->persist($realisateur);
$em->flush($realisateu); // pas de variable $realisateur dans un flush et en plus il y a une faute de frappe
return $this->redirectToRoute('app_home');



}else{
    
    return $this->render('add_director/index.html.twig', [
    'controller_name' => 'AddDirectorController',
    'form'=> $form]);
 }

    
    }}
