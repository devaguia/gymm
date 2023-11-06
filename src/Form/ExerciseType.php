<?php

namespace App\Form;

use App\Entity\Exercise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExerciseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options: ['label' => 'Exercise name'])
            ->add('series', options: ['label' => 'Series'])
            ->add('repetitions', options: ['label' => 'Repetitions'])
            ->add('weight', options: ['label' => 'Weight'])
            ->add('description', TextareaType::class, options: ['required' => false])
            ->setMethod($options['is_edit'] ? 'PATCH' : 'POST')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exercise::class,
            'is_edit'    => false
        ]);

        $resolver->setAllowedTypes('is_edit', 'bool');
    }
}
