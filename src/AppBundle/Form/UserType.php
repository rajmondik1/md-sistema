<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('surname', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-default form-control'
                ],
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_user_type';
    }
}
