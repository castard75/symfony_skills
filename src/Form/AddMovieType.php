<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
class AddMovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,['required' => true]) // Manque le formType adéquat et le required
            ->add('code',TextType::class,['required' => true]) // Manque le formType adéquat et le required
            ->add('online',CheckboxType::class,['required' => true]) // Manque le formType adéquat et le required
            ->add('serialNum',NumberType::class,['required' => true]) // Manque le formType adéquat et le required
            ->add('director',TextType::class,['required' => true]) // Manque le formType adéquat et le required
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
