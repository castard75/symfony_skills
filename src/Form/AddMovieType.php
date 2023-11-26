<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddMovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom') // Manque le formType adéquat et le required
            ->add('Code') // Manque le formType adéquat et le required
            ->add('Online') // Manque le formType adéquat et le required
            ->add('SerialNum') // Manque le formType adéquat et le required
            ->add('relation') // Manque le formType adéquat et le required
            ->add('valider',SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
