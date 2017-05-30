<?php
// src//AppBundle/Controller/CompanyController.php

namespace Iris\CompanyBundle\Controller;

// use utilisé pour la page Company
use AppBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;


class CompanyController extends Controller
{

    public function addAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            
            $this->addFlash(
            'notice',
            'Vous n\'avez pas les droits pour ajouter une entreprise!'
            );
            return $this->redirectToRoute('iris_company_liste_fiche');
        }else{
        // Création de l'entité Company
        $company = new Company();
        
        // On crée le FormBuilder grâce au service form factory
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $form = $this->createForm(\AppBundle\Form\Type\CompanyFormType::class, $company);
        
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

            $request->getSession()->getFlashBag()->add('notice', 'Entreprise bien enregistrée.');

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

        
    }
    

    public function editAction(Request $request, Company $company)
    {
        $form = $this->createForm(\AppBundle\Form\Type\CompanyFormType::class, $company);
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


    /**
     * @param Request $request
     *
     * @return Response
     */
    public function registerUserAction($id, Request $request)
    {
        $company = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Company')
        ->find($id)
        ;

        /** @var $formFactory FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);
        $user->setCompany($company);

        $event = new GetResponseUserEvent($user, $request);

        if (null !== $event->getResponse()) { return $event->getResponse(); }

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);

                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('iris_company_fiche', array('id' => $id));
                    $response = new RedirectResponse($url);
                }

                return $response;
            }

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);

            if (null !== $response = $event->getResponse()) { return $response; }
        }

        return $this->render('@FOSUser/Registration/registerbycompany.html.twig', array('form' => $form->createView(),));
    }
}