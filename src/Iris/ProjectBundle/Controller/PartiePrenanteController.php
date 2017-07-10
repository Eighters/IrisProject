<?php
// src//AppBundle/Controller/EnjeuxController.php

namespace Iris\ProjectBundle\Controller;

// use utilisé pour la page Partie Prenante
use AppBundle\Entity\PartiePrenante;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;


class PartiePrenanteController extends Controller
{

    public function addAction($id, Request $request)
    {
        
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;

        // Création de l'entité Enjeux
        $partiePrenante = new PartiePrenante();

        $partiePrenante->setProject($project);

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
        $form = $this->createForm(\AppBundle\Form\Type\PartiePrenanteType::class, $partiePrenante, array('project' => $project,
        'usersList' => $usersList ));
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
          $form->handleRequest($request);

          // On vérifie que les valeurs entrées sont correctes
          if ($form->isSubmitted() && $form->isValid()) {

            // On enregistre notre objet $form dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($partiePrenante);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Partie Prenante bien enregistrée.');

            // On redirige vers la page de visualisation de l'entreprise nouvellement créée
            return $this->redirectToRoute('iris_project_partieprenante_fiche', array('idproject' => $id, 'id' => $partiePrenante->getId()));
          }
        }

        
        // À partir du formBuilder, on génère le formulaire
        
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('IrisProjectBundle:PartiePrenante:creationPartiePrenante.html.twig', array(
          'form' => $form->createView(),
        ));
        

        
    }
    

    public function editAction(Request $request, PartiePrenante $partiePrenante)
    {
        $project = $partiePrenante->getProject();

        $usersList = new ArrayCollection();
        $companies = $project->getCompanies();
        foreach($companies as $company) {
            $users = $company->getUsers();
            foreach ($users as $user) {
                $usersList[] = $user;
            }
        }

        $form = $this->createForm(\AppBundle\Form\Type\PartiePrenanteType::class, $partiePrenante, array('project' => $project,
        'usersList' => $usersList ));
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $partiePrenante = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($partiePrenante);
            $em->flush();
            $this->addFlash('success', 'Partie Prenante mise à jour');
            return $this->redirectToRoute('iris_project_partieprenante_fiche', array('idproject' => $partiePrenante->getProject()->getId(), 'id' => $partiePrenante->getId()));
        }
        return $this->render('IrisProjectBundle:PartiePrenante:creationPartiePrenante.html.twig',    
            array('form' => $form->createView(), 
                ));
    }
    
    public function showAction($id){
        $partiePrenante = $this
        ->getDoctrine()
        ->getRepository('AppBundle:PartiePrenante')
        ->find($id)
        ;
        
        if (!$partiePrenante){
            throw $this->createNotFoundException('Aucune partie prenante ne correspond a cette id');
        }
        
        return $this->render('IrisProjectBundle:PartiePrenante:index.html.twig', 
                array('partiePrenante'  => $partiePrenante ));
    }
    
    public function showAllAction($id){
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;
        
        if (!$project){
            throw $this->createNotFoundException('Aucun Projet n\'existe');
        }
        
        return $this->render('IrisProjectBundle:PartiePrenante:listePartiePrenantes.html.twig', 
                array('project'  => $project ));
    }
    
}
