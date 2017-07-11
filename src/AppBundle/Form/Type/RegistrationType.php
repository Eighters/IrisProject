<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('nom')
        ->add('address')
        ->add('roles', ChoiceType::class, array(
                'attr'  =>  array('class' => 'form-control',
                    'style' => 'margin:5px 0;'),
                'choices' =>
                    array
                    (
                            'ROLE_ADMIN' => 'ROLE_ADMIN',
                            'ROLE_USER' => 'ROLE_USER',
                            'ROLE_RESP' => 'ROLE_RESP'
                    ) ,
                'multiple' => true,
                'required' => true,
            )
        );

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
