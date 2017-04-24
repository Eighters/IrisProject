<?php
// src//AppBundle/Controller/CompanyController.php

namespace Iris\CompanyBundle\Controller;

// use utilisé pour la page Company
use AppBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CompanyController extends Controller
{
    
    public function addAction(Request $request)
    {
        
        // Création de l'entité Company
        $company = new Company();
        
        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->createForm(\AppBundle\Form\CompanyFormType::class, $company);
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
          $form->handleRequest($request);

          // On vérifie que les valeurs entrées sont correctes
          if ($form->isSubmitted() && $form->isValid()) {
            // On enregistre notre objet $form dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($company);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            // On redirige vers la page de visualisation de l'entreprise nouvellement créée
            return $this->redirectToRoute('iris_company_fiche', array('id' => $company->getId()));
          }
        }

        
        // À partir du formBuilder, on génère le formulaire
        
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('IrisCompanyBundle:Default:creationEntreprise.html.twig', array(
          'form' => $form->createView(),
        ));
        
    }
    

    public function editAction(Request $request, Company $company)
    {
        $form = $this->createForm(\AppBundle\Form\CompanyFormType::class, $company);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $company = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($company);
            $em->flush();
            $this->addFlash('success', 'Company updated!');
            return $this->redirectToRoute('iris_company_fiche', array('id' => $company->getId()));
        }
        return $this->render('IrisCompanyBundle:Default:modificationEntreprise.html.twig',    
            array('companyForm' => $form->createView(), 
                ));
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