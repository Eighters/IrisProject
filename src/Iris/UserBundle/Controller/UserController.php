<?php

namespace Iris\UserBundle\Controller;

// use utilisé pour la page Company
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of UserController
 *
 * @author yaniv
 */
class UserController extends Controller{
    

    public function showAllAction(){


    // Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
        $user = $this
        ->getDoctrine()
        ->getRepository('AppBundle:User')
        ->findAll()
        ;
        
        if (!$user){
            throw $this->createNotFoundException('Aucun utilisateur n\'existe');
        }
        
        return $this->render('IrisUserBundle:Default:listeUser.html.twig', 
                array('user'  => $user ));

    }
    else{
        return $this->render( 'error403.html.twig' );
    }  
    }
}
