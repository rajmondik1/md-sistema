<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('surname', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('telnumeris', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('gimdata', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'attr' => [
                    'class' => 'datepicker',
                    'style' => 'width:100%'
                ]
            ])
            ->add('asmkodas', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('klase', ChoiceType::class, [
                'choices' => [
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12,
                ]
            ])
            ->add('mokykla', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('tevtelef', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('tevuinfo', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('mokslometai', ChoiceType::class, [
                'choices' => [
                    '2017' => 2017,
                    '2018' => 2018
                ]

            ])
            ->add('baigimonr', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_student_type';
    }
}
