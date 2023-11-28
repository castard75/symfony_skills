<?php

namespace App\Form;

use App\Entity\Realisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Form\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class RealisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,['required' => true])
            ->add('country',ChoiceType::class,['required' => true,'choices' => [ // required incorrect
                'Mexico' => 'Mexico',
                'Colombia' => 'Colombia',
                'Brasil' => 'Brasil'

            ]])  // il existe un formType pour les pays donc il faut l'utiliser, on va pas ecrire à la main tous les pays du monde
            ->add('acceptedTerms', ChoiceType::class,[
                'mapped' => false,
            'choices'  => [
                
                'Yes' => true, // il y avait des phrases précises à respecter
                'No' => false, // il y avait des phrases précises à respecter
            ],
            ])
            ->add("envoyer",SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Realisateur::class,
        ]);
    }
}
