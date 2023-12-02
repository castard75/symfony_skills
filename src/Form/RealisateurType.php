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
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Intl\Countries;


class RealisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,['required' => true])
            ->add('country', CountryType::class, array( 'label' => 'Pays',
            'preferred_choices' => array('FR'),
            'choice_translation_locale' => null
            ))  
            ->add('acceptedTerms', ChoiceType::class,[
                'mapped' => false,
            'choices'  => [
                
                "J'accepte les conditions d'utilisation du site." => true, 
                "Non je n'accepte pas les conditions d'utilisation du site " => false, 
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
