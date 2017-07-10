<?php
// src//AppBundle/Controller/EnjeuxController.php

namespace Iris\ProjectBundle\Controller;

// use utilisé pour la page Objectif
use AppBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CompanyController extends Controller
{

    public function addAction($id, Request $request)
    {
        
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;

        // Création de l'entité Objectif
        $company = new Company();
        
        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->createForm(\AppBundle\Form\Type\ListCompanyType::class, $project);
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
          $form->handleRequest($request);

          // On vérifie que les valeurs entrées sont correctes
          if ($form->isSubmitted() && $form->isValid()) {
            // On enregistre notre objet $form dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Entreprise bien ajoutée.');

            // On redirige vers la page de visualisation de l'entreprise nouvellement créée
            return $this->redirectToRoute('iris_project_fiche', array('id' => $id));
          }
        }

        
        // À partir du formBuilder, on génère le formulaire
        
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('IrisProjectBundle:Company:formListCompany.html.twig', array(
          'form' => $form->createView(),
          'project' => $project,
        ));
        

        
    }
    
    
}
