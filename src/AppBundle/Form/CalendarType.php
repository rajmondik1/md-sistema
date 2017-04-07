<?php

namespace AppBundle\Form;

use AppBundle\Entity\Calendar;
use AppBundle\Entity\Programa;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalendarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'required' => true,
                'attr' => [
                    'class' => 'datepicker',
                    'style' => 'width:100%'
                ]
            ])
            ->add('end', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'required' => true,
                'attr' => [
                    'class' => 'datepicker',
                    'style' => 'width:100%'
                ]
            ])
            ->add('events', EntityType::class, [
                'class' => Programa::class,
                'attr' => [
                    'class' => 'form-control select2',
                    'style' => 'width:100%'
                ]
            ])

            ->add('save', SubmitType::class, [
                'label' => 'Išsaugoti',
                'attr' => [
                    'class' => 'btn btn-default'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Calendar::class
        ]);
    }

    public function getName()
    {
        return 'app_bundle_calendar';
    }
}
