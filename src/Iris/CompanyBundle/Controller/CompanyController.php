<?php
// src//AppBundle/Controller/CompanyController.php

namespace Iris\CompanyBundle\Controller;

// use utilisé pour la page Company
use AppBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends Controller
{
    
    public function addAction(Request $request)
    {
        
        // Création de l'entité Company
        $company = new Company();
        $company->setRaisonSocial('CinovIt');
        $company->setSiret("445666888259");
        $company->setTelephone("0788050460");

        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        // Étape 1 : On « persiste » l'entité
        $em->persist($company);

        // Étape 2 : On déclenche l'enregistrement
        $em->flush();

        return $this->render('IrisCompanyBundle:Default:index.html.twig');
        
    }
    
    public function showAction($id){
        $company = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Company')
        ->find($id)
        ;
        
        if (!$company){
            throw $this->createNotFoundException('Aucune entreprise ne correspond a cette id');
        }
        
        return $this->render('IrisCompanyBundle:Default:index.html.twig', 
                array('company'  => $company ));
    }
    
    public function showAllAction(){
        $company = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Company')
        ->findAll()
        ;
        
        if (!$company){
            throw $this->createNotFoundException('Aucune entreprise n\'existe');
        }
        
        return $this->render('IrisCompanyBundle:Default:listeEntreprise.html.twig', 
                array('company'  => $company ));
    }
}