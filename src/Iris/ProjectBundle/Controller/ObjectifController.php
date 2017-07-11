<?php
// src//AppBundle/Controller/EnjeuxController.php

namespace Iris\ProjectBundle\Controller;

// use utilisé pour la page Objectif
use AppBundle\Entity\Objectif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ObjectifController extends Controller
{

    public function addAction($id, Request $request)
    {
        
        $enjeu = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Enjeux')
        ->find($id)
        ;

        // Création de l'entité Objectif
        $objectif = new Objectif();

        $objectif->setEnjeux($enjeu);
        
        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->createForm(\AppBundle\Form\Type\ObjectifFormType::class, $objectif);
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
          $form->handleRequest($request);

          // On vérifie que les valeurs entrées sont correctes
          if ($form->isSubmitted() && $form->isValid()) {

            // On enregistre notre objet $form dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($objectif);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Objectif bien enregistré.');

            // On redirige vers la page de visualisation de l'entreprise nouvellement créée
            return $this->redirectToRoute('iris_project_enjeux_liste', array('id' => $enjeu->getProject()->getId()));
          }
        }

        
        // À partir du formBuilder, on génère le formulaire
        
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('IrisProjectBundle:Objectif:formObjectif.html.twig', array(
          'form' => $form->createView(),
        ));
        

        
    }
    

    public function editAction(Request $request, Objectif $objectif)
    {
        $form = $this->createForm(\AppBundle\Form\Type\ObjectifFormType::class, $objectif);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $objectif = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($objectif);
            $em->flush();
            $this->addFlash('success', 'Objectif mis à jour !');
            return $this->redirectToRoute('iris_project_enjeux_liste', array('id' => $objectif->getEnjeux()->getProject()->getId()));
        }
        return $this->render('IrisProjectBundle:Objectif:formObjectif.html.twig',    
            array('form' => $form->createView(), 
                ));
    }
    
}
