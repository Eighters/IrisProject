<?php
// src//AppBundle/Controller/ProjectController.php

namespace Iris\ProjectBundle\Controller;

// use utilisé pour la page Project
use AppBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;


class ProjectController extends Controller
{

    public function addAction(Request $request)
    {
        
        // Création de l'entité Project
        $project = new Project();
        
        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->createForm(\AppBundle\Form\Type\ProjectFormType::class, $project);
        
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

            $request->getSession()->getFlashBag()->add('notice', 'Projet bien enregistrée.');

            // On redirige vers la page de visualisation de l'entreprise nouvellement créée
            return $this->redirectToRoute('iris_project_fiche', array('id' => $project->getId()));
          }
        }

        
        // À partir du formBuilder, on génère le formulaire
        
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('IrisProjectBundle:Default:creationProject.html.twig', array(
          'form' => $form->createView(),
        ));
        

        
    }
    

    public function editAction(Request $request, Project $project)
    {
        $form = $this->createForm(\AppBundle\Form\ProjectFormType::class, $project);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $project = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            $this->addFlash('success', 'Project updated!');
            return $this->redirectToRoute('iris_project_fiche', array('id' => $project->getId()));
        }
        return $this->render('IrisProjectBundle:Default:modificationProject.html.twig',    
            array('projectForm' => $form->createView(), 
                ));
    }
    
    public function showAction($id){
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;
        
        if (!$project){
            throw $this->createNotFoundException('Aucun projet ne correspond a cette id');
        }
        
        return $this->render('IrisProjectBundle:Default:index.html.twig', 
                array('project'  => $project ));
    }
    
    public function showAllAction(){
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->findAll()
        ;
        
        if (!$project){
            throw $this->createNotFoundException('Aucun Projet n\'existe');
        }
        
        return $this->render('IrisProjectBundle:Default:listeProject.html.twig', 
                array('project'  => $project ));
    }


    
}