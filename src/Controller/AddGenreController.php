<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Film;
use App\Entity\Realisateur;
use App\Entity\Genre;
use App\DTO\FilmDTO;
use App\Form\FilmDTOType;

class AddGenreController extends AbstractController
{
    #[Route('/addGenre', name: 'app_add_genre')]
    public function index(Request $request,EntityManagerInterface $em): Response
    {
   

        $dto = new FilmDTO();
       
        $form = $this->createForm(FilmDTOType::class, $dto); 
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
         
            $formData = $form->getData();
            
            $film = (new Film())
            ->setName($dto->getName())
            ->setCode($dto->getCode())
            ->setOnline($dto->getOnline())
            ->setSerialNum($dto->getSerialNum())
            ->setDirector($dto->getDirector())
            ->setGenre($dto->getGenre());

            $em->persist($film);
            $em->flush();

         return $this->redirectToRoute('app_success');

            
        }
        
        return $this->render('add_genre/index.html.twig', [
            'controller_name' => 'AddGenreController',
            'form'=> $form
        ]);
    }
}
