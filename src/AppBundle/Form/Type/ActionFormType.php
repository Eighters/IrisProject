<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListCompanyFormType
 *
 * @author yaniv
 */
namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ActionFormType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('visibilite', ChoiceType::class, array(
                    'choices'  => array(
                        'Interne' => 'Interne',
                        'Externe' => 'Externe',
                    ),
                ))
                ->add('nom')
                ->add('responsable')
                ->add('origine')
                ->add('datedebut', DateType::class)
                ->add('echeancePrevue', DateType::class)
                ->add('dateFinReelle', DateType::class)
                
                ->add('urgence', ChoiceType::class, array(
                    'choices'  => array(
                        'Faible' => 'Faible',
                        'Modérée' => 'Modéré',
                        'Forte' => 'Forte',
                    ),
                ))
                
                ->add('etat', ChoiceType::class, array(
                    'choices'  => array(
                        'A faire' => 'A faire',
                        'En cours' => 'En cours',
                        'Close' => 'Close',
                    ),
                ))
                
                ->add('observation', TextareaType::class, array(
                    'label' => 'Observation',
                    'attr' => array('id' => 'message','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
                ))
                
                ->add('enregistrer', SubmitType::class, array(
                        'attr' => array('class' => 'btn btn-primary')
                    ))
                ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Action'
        ]);
    }
}
