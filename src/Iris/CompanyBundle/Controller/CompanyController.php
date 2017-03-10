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
        $form = $this->get('form.factory')->createBuilder(FormType::class, $company)
            ->add('raisonSocial',      TextType::class)
            ->add('siret',     TextType::class)
            ->add('telephone',   TextType::class)
            ->add('Enregistrer',      SubmitType::class)
            ->getForm()
        ;
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
          $form->handleRequest($request);

          // On vérifie que les valeurs entrées sont correctes
          // (Nous verrons la validation des objets en détail dans le prochain chapitre)
          if ($form->isValid()) {
            // On enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $em->persist($company);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            // On redirige vers la page de visualisation de l'annonce nouvellement créée
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