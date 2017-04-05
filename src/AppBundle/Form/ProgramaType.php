<?php

namespace AppBundle\Form;

use AppBundle\Entity\Student;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgramaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pavadinimas', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('aprasymas', TextareaType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '5'
                ]
            ])

            // name + surname??

            ->add('teacher', EntityType::class, [
                'class' => 'AppBundle\Entity\Teacher',
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('student', EntityType::class, [
                'class' => Student::class,
                'choice_label' => 'name',
                'choices_as_values' => true,
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control multiple select2',
                    'style' => 'width:100%',
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Issaugoti',
                'attr' => [
                    'class' => 'btn btn-default',
                ]
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'app_bundle_programa_type';
    }
}
