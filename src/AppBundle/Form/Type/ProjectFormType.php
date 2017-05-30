<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjecctFormType
 *
 * @author rechad
 */
namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProjectFormType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('dateLancement')
            ->add('type')
            ->add('besoin', TextType::class, array(
                'label' => 'Besoin'
            ))
            ->add('origine')
            ->add('description', TextareaType::class, array(
                    'label' => 'Description',
                    'attr' => array('id' => 'description','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
            ))
            ->add('benefices', TextareaType::class, array(
                    'label' => 'Benefices',
                    'attr' => array('id' => 'benefices','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
            ))
            ->add('enregistrer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-primary')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Project'
        ]);
    }
}
