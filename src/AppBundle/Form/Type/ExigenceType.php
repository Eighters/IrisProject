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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ExigenceType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $project = $options['project'];
        $listPartiePrenante = $options['listPartiePrenante'];
        $listObjectifs = $options['listObjectifs'];

        $builder->add('reference')
                ->add('type', ChoiceType::class, array(
                    'choices'  => array(
                        'Fonctionnelle' => 'Fonctionnelle',
                        'Non fonctionnelle' => 'Non fonctionnelle',
                        'Contrainte' => 'Contrainte',
                    ),
                ))
                ->add('definition')
                ->add('conditionAcceptation', TextareaType::class, array(
                    'label' => 'Conditions d\'acceptations',
                    'attr' => array('id' => 'conditions','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
                ))
                ->add('priorite', ChoiceType::class, array(
                    'choices'  => array(
                        'Non négociable - Must' => 'Non négociable - Must',
                        'Requis non bloquant - Should' => 'Requis non bloquant - Should',
                        'Optionnel un plus - Wont' => 'Optionnel un plus - Wont',
                        'Non applicable - N/A' => 'Non applicable - N/A',
                    ),
                ))
                ->add('statut', ChoiceType::class, array(
                    'choices'  => array(
                        'Rédaction en cours' => 'Rédaction en cours',
                        'Formalisée' => 'Formalisée',
                        'Validée' => 'Validée',
                        'Recettée' => 'Recettée',
                        'Mise en oeuvre' => 'Mise en oeuvre',
                        'Annulée' => 'Annulée',
                    ),
                ))
                
                ->add('objectif', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:Objectif',
                'label' => 'Objectif lié',

                // use the User.username property as the visible option string
                'choice_label' => 'description',
                'choices' => $listObjectifs,

                'group_by' => function ($objectif) {
                    return $objectif->getEnjeux()->getNom();
                },
                ))
                ->add('partiePrenante', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:PartiePrenante',
                'label' => 'Parties Prenantes',

                // use the User.username property as the visible option string
                'choice_label' => 'nom',
                'choices' => $listPartiePrenante,
                ))
                ->add('enregistrer', SubmitType::class, array(
                        'attr' => array('class' => 'btn btn-primary')
                    ))
                ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Exigence'
        ])
        ->setRequired(array(
            'project',
            'listPartiePrenante',
            'listObjectifs',
        ));
    }
}
