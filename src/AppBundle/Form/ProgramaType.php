<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgramaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pavadinimas', TextType::class, [
                'required' => true
            ])
            ->add('aprasymas', TextType::class, [
                'required' => true
            ])
            ->add('users', EntityType::class, [
                'class' => User::class,
                'choices_as_values' => true,
                'multiple' => true,
                'attr' => [
                    'class' => 'multiple'
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Issaugoti'])
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
