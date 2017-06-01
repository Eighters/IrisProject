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
namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EnjeuxFormType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'Métier' => 'Metier',
                    'Informatique' => 'Informatique',
                    'Financier' => 'Financier',
                    'Réglementaire' => 'Reglementaire',
                ),
            ))
            ->add('priorite', ChoiceType::class, array(
                'choices'  => array(
                    'Non Négociable - Must' => 'Must',
                    'Requis non bloquant - Should' => 'Should',
                    'Optionel en plus - Wont' => 'Wont',
                    'Non applicable - N/A' => 'N/A',
                ),
            ))
            ->add('valeurCible', TextareaType::class, array(
                    'label' => 'Valeur Cible',
                    'attr' => array('id' => 'description','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
            ))
            ->add('enregistrer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-primary')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Enjeux'
        ]);
    }
}
