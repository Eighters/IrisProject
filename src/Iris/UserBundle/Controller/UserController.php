<?php

namespace Iris\UserBundle\Controller;

// use utilisé pour la page Company
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
/**
 * Description of UserController
 *
 * @author yaniv
 */
class UserController extends Controller{
    
    public function showAllAction(){
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
}
