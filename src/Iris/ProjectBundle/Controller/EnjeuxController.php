<?php
// src//AppBundle/Controller/EnjeuxController.php

namespace Iris\ProjectBundle\Controller;

// use utilisé pour la page Enjeux
use AppBundle\Entity\Enjeux;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EnjeuxController extends Controller
{

    public function addAction($id, Request $request)
    {
        
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;

        // Création de l'entité Enjeux
        $enjeu = new Enjeux();

        $enjeu->setProject($project);
        
        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->createForm(\AppBundle\Form\Type\EnjeuxFormType::class, $enjeu);
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
          $form->handleRequest($request);

          // On vérifie que les valeurs entrées sont correctes
          if ($form->isSubmitted() && $form->isValid()) {

            // On enregistre notre objet $form dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($enjeu);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Enjeu bien enregistrée.');

            // On redirige vers la page de visualisation de l'entreprise nouvellement créée
            return $this->redirectToRoute('iris_project_enjeux_liste', array('id' => $id));
          }
        }

        
        // À partir du formBuilder, on génère le formulaire
        
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('IrisProjectBundle:Enjeux:creationEnjeux.html.twig', array(
          'form' => $form->createView(),
        ));
        

        
    }
    

    public function editAction(Request $request, Enjeux $enjeu)
    {
        $form = $this->createForm(\AppBundle\Form\Type\EnjeuxFormType::class, $enjeu);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $enjeu = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($enjeu);
            $em->flush();
            $this->addFlash('success', 'Enjeux mis à jour!');
            return $this->redirectToRoute('iris_project_enjeux_liste', array('id' => $enjeu->getProject()->getId()));
        }
        return $this->render('IrisProjectBundle:Enjeux:creationEnjeux.html.twig',    
            array('form' => $form->createView(), 
                ));
    }
    
    public function showAction($id){
        $enjeu = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Enjeux')
        ->find($id)
        ;
        
        if (!$enjeu){
            throw $this->createNotFoundException('Aucun enjeu ne correspond a cette id');
        }
        
        return $this->render('IrisProjectBundle:Enjeux:index.html.twig', 
                array('enjeu'  => $enjeu ));
    }
    
    public function showAllAction($id){
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;
        
        $enjeux = $project->getEnjeux();

        if (!$project){
            throw $this->createNotFoundException('Aucun Projet n\'existe');
        }
        
        return $this->render('IrisProjectBundle:Enjeux:listeEnjeux.html.twig', 
                array('project'  => $project, 'enjeux' => $enjeux ));
    }
    
}
