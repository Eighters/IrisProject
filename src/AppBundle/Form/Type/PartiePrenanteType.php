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

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PartiePrenanteType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $usersList = $options['usersList'];
        $builder->add('nom')
                ->add('type', ChoiceType::class, array(
                    'choices'  => array(
                        'Sponsor' => 'Sponsor',
                        'MOA' => 'MOA',
                        'MOE' => 'MOE',
                        'Utilisateurs' => 'Utilisateurs',
                        'Clients' => 'Clients',
                    ),
                ))
                ->add('influence', ChoiceType::class, array(
                    'choices'  => array(
                        'Très forte' => 'Très forte',
                        'Forte' => 'Forte',
                        'Moyenne' => 'Moyenne',
                        'Faible' => 'Faible',
                    ),
                ))
                ->add('impact', ChoiceType::class, array(
                    'choices'  => array(
                        'Très fort' => 'Très fort',
                        'Fort' => 'Fort',
                        'Moyen' => 'Moyen',
                        'Faible' => 'Faible',
                    ),
                ))
                ->add('observation', TextareaType::class, array(
                    'label' => 'Observations',
                    'attr' => array('id' => 'observation','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
                ))
                ->add('users', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:User',
                'label' => 'Utilisateurs',

                // use the User.username property as the visible option string
                'choice_label' => 'nom',
                'choices' => $usersList,

                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
                'group_by' => function (User $user) {
                    return $user->getCompany()->getRaisonSocial();
                },
                ))
                ->add('enregistrer', SubmitType::class, array(
                        'attr' => array('class' => 'btn btn-primary')
                    ))
                ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\PartiePrenante'
        ])
        ->setRequired(array(
            'usersList',
        ));
    }
}
