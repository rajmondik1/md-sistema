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
            ->add('start', DateTimeType::class)
            ->add('end', DateTimeType::class)
            ->add('events', EntityType::class, [
                'class' => Programa::class
            ])
            ->add('repeat', ChoiceType::class, [
                'choices' => [
                    'Kas savaite' => 'week',
                    'Kasdien' => 'day'
                ],
                'mapped' => false
            ])
            ->add('hm', ChoiceType::class, [
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                ],
                'mapped' => false
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Issaugoti'
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
