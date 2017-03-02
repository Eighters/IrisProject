<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TestController extends Controller
{
    /**
     * @Route("/test/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

         return $this->render('test/number.html.twig', array(
            'number' => $number,
        ));
    }
}
?>