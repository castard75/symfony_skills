<?php

namespace App\Form;
use App\DTO\FilmDTO;
use App\Entity\Film;
use App\Entity\Genre;
use App\Entity\Realisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class FilmDTOType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name',TextType::class,['required' => true])
        ->add('code',TextType::class,['required' => false]) 
        ->add('online',ChoiceType::class,['required' => true,'choices' => [
            'En ligne' => true,
            'Hors ligne' => false,
        ]]) 
        ->add('serialNum',NumberType::class,['required' => false])
          
        ->add('director', EntityType::class, [
            'required'=>true,
            'class' => Realisateur::class,
            'choice_label' => 'name',
            'attr' => ['hidden' => false]
        ])
        ->add('genre', EntityType::class, [
            'required'=>true,
            'class' => Genre::class,
            'choice_label' => 'nom',
            'attr' => ['hidden' => false]
        ])
        ->add('valider',SubmitType::class);   
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FilmDTO::class
        ]);
    }
}
