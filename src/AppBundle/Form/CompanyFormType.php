<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyFormType
 *
 * @author yaniv
 */
namespace AppBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CompanyFormType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raisonSocial')
            ->add('siret')
            ->add('telephone')
            ->add('address', TextType::class, array(
                'label' => 'Adresse'
            ))
            ->add('description', TextareaType::class, array(
                    'label' => 'Description',
                    'attr' => array('id' => 'message','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
            ))
            ->add('mail')
            ->add('imageFile', VichFileType::class, array(
                'label' => 'Image',
                'required' => false,
                'allow_delete' => true
            ))
            ->add('enregistrer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-primary')
            ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Company'
        ]);
    }
}
