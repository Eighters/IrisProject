<?php

namespace Iris\UserBundle\Controller;

// use utilisé pour la page Company
use AppBundle\Entity\User;
use AppBundle\Entity\Company;
use AppBundle\Entity\RoleUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    
    public function addAction(Request $request)
    {
        // Création de l'entité User

        $company = new Company;
        $role = new RoleUser;
        
        $user = new User();
        $user->setCompany('CInovIt');
        $user->setEmail('yanivkoubbi@gmail.com');
        $user->setNom('Koubbi');
        $user->setPrenom('Yaniv');
        $user->setRoleUser($role->getId(1));
        $user->setUsername('vinayk');
        $user->setCompany($company->getId(13));

        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        // Étape 1 : On « persiste » l'entité
        $em->persist($user);

        // Étape 2 : On déclenche l'enregistrement
        $em->flush();

        return $this->render('IrisUserBundle:Default:index.html.twig');
        
    }
}