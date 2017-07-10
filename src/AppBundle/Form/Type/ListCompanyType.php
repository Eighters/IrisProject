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

class ListCompanyType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('companies', EntityType::class, array(
            // query choices from this entity
            'class' => 'AppBundle:Company',
            'label' => 'Entreprises',

            // use the User.username property as the visible option string
            'choice_label' => 'raisonSocial',

            // used to render a select box, check boxes or radios
            'multiple' => true,
            'expanded' => true,

        ))
        ->add('enregistrer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-primary')
            ))
        ;

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Project'
        ]);
    }
}
