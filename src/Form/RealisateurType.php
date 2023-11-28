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
            ->add('name',TextType::class,['required' => true])  // Manque le formType adéquat et le required
            ->add('country',ChoiceType::class,['required' => true,'choices' => [
                'Mexico' => 'Mexico',
                'Colombia' => 'Colombia',
                'Brasil' => 'Brasil'
                // Add more countries as needed
            ]])  // Manque le formType adéquat et le required   // pour les pays, faut proposer une liste de pays
            ->add('acceptedTerms', ChoiceType::class,[
                'mapped' => false,
            'choices'  => [
                
                'Yes' => true,
                'No' => false,
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
