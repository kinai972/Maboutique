<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'attr'  => [
                    'placeholder' => "Veuillez saisir votre prénom"
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'attr'  => [
                    'placeholder' => "Veuillez saisir votre nom"
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Votre adresse électronique',
                'attr'  => [
                    'placeholder' => "Veuillez saisir votre adresse électronique"
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => "Votre mot de passe",
                'attr'  => [
                    'placeholder' => 'Veuillez saisir votre mot de passe'
                ]
            ])
            ->add('password_confirm', PasswordType::class, [
                'label' => "Confirmation de votre mot de passe",
                'mapped' => false,
                'attr'  => [
                    'placeholder' => 'Veuillez saisir de nouveau votre mot de passe'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}