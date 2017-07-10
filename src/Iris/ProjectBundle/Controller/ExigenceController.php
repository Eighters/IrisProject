<?php
// src//AppBundle/Controller/EnjeuxController.php

namespace Iris\ProjectBundle\Controller;

// use utilisé pour la page Exigence
use AppBundle\Entity\Exigence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;


class ExigenceController extends Controller
{

    public function addAction($id, Request $request)
    {
        
        $project = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Project')
        ->find($id)
        ;

        
        $listPartiePrenante = $project->getPartiesPrenantes();
        $listObjectifs = new ArrayCollection();
        $enjeux = new ArrayCollection();
        $enjeux = $project->getEnjeux();

        foreach($enjeux as $enjeu) {
            $objectifs = $enjeu->getObjectifs();
            foreach ($objectifs as $obj) {
                $listObjectifs[] = $obj;
            }
        }
        // Création de l'entité Exigence
        $exigence = new Exigence();
        
        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->createForm(\AppBundle\Form\Type\ExigenceType::class, $exigence, array('project' => $project,
        'listPartiePrenante' => $listPartiePrenante, 'listObjectifs' => $listObjectifs ));
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
          $form->handleRequest($request);

          // On vérifie que les valeurs entrées sont correctes
          if ($form->isSubmitted() && $form->isValid()) {

            // On enregistre notre objet $form dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($exigence);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Exigence bien enregistrée.');

            // On redirige vers la page de visualisation de l'entreprise nouvellement créée
            return $this->redirectToRoute('iris_project_exigence_fiche', array('idproject' => $id, 'id' => $exigence->getId()));
          }
        }

        
        // À partir du formBuilder, on génère le formulaire
        
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('IrisProjectBundle:Exigence:creationExigence.html.twig', array(
          'form' => $form->createView(),
        ));
        

        
    }
    

    public function editAction(Request $request, Exigence $exigence)
    {
        $project = $exigence->getProject();

        $listPartiePrenante = $project->getPartiesPrenantes();
        $listObjectifs = new ArrayCollection();
        $enjeux = new ArrayCollection();
        $enjeux = $project->getEnjeux();

        foreach($enjeux as $enjeu) {
            $objectifs = $enjeu->getObjectifs();
            foreach ($objectifs as $obj) {
                $listObjectifs[] = $obj;
            }
        }

        $form = $this->createForm(\AppBundle\Form\Type\ExigenceType::class, $exigence, array('project' => $project,
        'listPartiePrenante' => $listPartiePrenante, 'listObjectifs' => $listObjectifs ));

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $exigence = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($exigence);
            $em->flush();
            $this->addFlash('success', 'Exigence mise à jour');
            return $this->redirectToRoute('iris_project_exigence_fiche', array('idproject' => $project->getId(), 'id' => $exigence->getId()));
        }
        return $this->render('IrisProjectBundle:Exigence:creationExigence.html.twig',    
            array('form' => $form->createView(), 
                ));
    }
    
    public function showAction($id){
        $exigence = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Exigence')
        ->find($id)
        ;
        

        if (!$exigence){
            throw $this->createNotFoundException('Aucune exigence ne correspond a cette id');
        }
        $project = $exigence->getPartiePrenante()->getProject();
        
        return $this->render('IrisProjectBundle:Exigence:index.html.twig', 
                array('exigence'  => $exigence, 'project' => $project ));
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
        
        return $this->render('IrisProjectBundle:Enjeux:listeExigence.html.twig', 
                array('project'  => $project ));
    }
    
}
