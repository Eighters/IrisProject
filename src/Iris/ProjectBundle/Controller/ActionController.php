<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActionController
 *
 * @author yaniv
 */
// src//AppBundle/Controller/ActionController.php

namespace Iris\ProjectBundle\Controller;

// use utilisé pour la page Exigence
use AppBundle\Entity\Action;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;


class ActionController extends Controller
{

    public function addAction($id, Request $request)
    {
        
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;
        
        $user = $this->getUser();
        
        // Création de l'entité Action
        $action = new Action();
        $action->setProject($project);
        $action->setOrigine($user);
        
        $usersList = new ArrayCollection();
        $companies = $project->getCompanies();
        foreach($companies as $company) {
            $users = $company->getUsers();
            foreach ($users as $user) {
                $usersList[] = $user;
            }
        }
        
        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->createForm(\AppBundle\Form\Type\ActionFormType::class, $action, array('usersList' => $usersList ));
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
          $form->handleRequest($request);

          // On vérifie que les valeurs entrées sont correctes
          if ($form->isSubmitted() && $form->isValid()) {

            // On enregistre notre objet $form dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($action);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Action bien enregistrée.');

            // On redirige vers la page de visualisation de l'entreprise nouvellement créée
            return $this->redirectToRoute('iris_project_action_liste', array('id' => $id));
          }
        }

        
        // À partir du formBuilder, on génère le formulaire
        
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('IrisProjectBundle:Action:creationAction.html.twig', array(
          'form' => $form->createView(),
        ));
        

        
    }
    

    public function editAction(Request $request, Action $action)
    {
        $project = $action->getProject();
    
        $user = $this->getUser();
        
        $action->setProject($project);
        $action->setOrigine($user);
        
        $usersList = new ArrayCollection();
        $companies = $project->getCompanies();
        foreach($companies as $company) {
            $users = $company->getUsers();
            foreach ($users as $user) {
                $usersList[] = $user;
            }
        }
        

        $form = $this->createForm(\AppBundle\Form\Type\ActionFormType::class, $action, array('usersList' => $usersList ));

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $action = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($action);
            $em->flush();
            $this->addFlash('success', 'Action mise à jour');
            return $this->redirectToRoute('iris_project_action_liste', array('id' => $project->getId()));
        }
        return $this->render('IrisProjectBundle:Action:creationAction.html.twig',    
            array('form' => $form->createView(), 
                ));
    }
    
    public function showAction($id){
        $action = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Action')
        ->find($id)
        ;
        

        if (!$action){
            throw $this->createNotFoundException('Aucune action ne correspond a cette id');
        }
        
        return $this->render('IrisProjectBundle:Action:index.html.twig', 
                array('action'  => $action ));
    }
    
    public function showAllAction($id){

        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;

        $actions = $project->getActions();
        
        return $this->render('IrisProjectBundle:Action:listeAction.html.twig', 
                array('actions'  => $actions, 'project'=> $project ));
    }
    
}
