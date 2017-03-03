<?php

namespace Iris\CompanyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IrisCompanyBundle:Default:index.html.twig');
    }
}
