<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('lastname')
            ->add('mail', EmailType::class)
            ->add('height', NumberType::class)
            ->add('weight', NumberType::class)
            ->add('gender', ChoiceType::class, options: [
                'choices' => [
                    'Male' => 0,
                    'Female' => 1
                ]
            ])
            ->add('age', DateType::class, options: [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy'
            ])
            ->setMethod('PATCH')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
