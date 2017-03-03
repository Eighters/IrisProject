<?php

namespace Iris\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IrisUserBundle:Default:index.html.twig');
    }
}
