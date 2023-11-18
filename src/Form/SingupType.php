<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SingupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options: ['label' => false])
            ->add('lastname', options: ['label' => false])
            ->add('mail', EmailType::class, options: ['label' => false])
            ->add('password', PasswordType::class, options: ['label' => false])
            ->add('gender', ChoiceType::class, options: [
                'choices' => [
                    'Male' => 0,
                    'Female' => 1
                ],
                'label' => false
            ])
            ->add('age', DateType::class, options: [
                'label' => false,
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'd/m/Y'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
