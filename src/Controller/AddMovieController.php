<?php

namespace App\Controller;
use App\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AddMovieType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;


class AddMovieController extends AbstractController
{
    #[Route('/addMovie', name: 'app_add_movie')]
    public function index(Request $request ,EntityManagerInterface $em ): Response
    {
$films = new Film();

$form = $this->createForm(AddMovieType::class,$films);



$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
   

  
     
    $em->persist($films);
    $em->flush();
       
        return $this->redirectToRoute('app_success');
  

} else {
   
        return $this->render('add_movie/index.html.twig', [
            'controller_name' => 'AddMovieController',
            'form'=> $form->createView()
        ]);
    }
}


#[Route('/success', name: 'app_success')]
public function succes() : Response{


return $this->render('add_movie/sucess.html.twig',[
    'controller_name' => 'Succes'
]);

}
}