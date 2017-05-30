<?php

namespace Iris\UserBundle\Controller;

// use utilisé pour la page Company
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Controller\RegistrationController as BaseController;


class RegistrationController extends BaseController
{
    
    public function addAction(Request $request)
    {
        return $this->render('IrisUserBundle:Default:index.html.twig');
        
    }
    
    
}