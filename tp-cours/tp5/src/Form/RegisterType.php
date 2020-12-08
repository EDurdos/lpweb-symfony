<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Email'
                ]
            ])
            ->add('password', null, [
                'attr' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Mot de passe'
                ]
            ])
            ->add('confirm_password', PasswordType::class, [
                'attr' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Confirmation du mot de passe'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
