<?php

namespace TG\UdecBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TGUdecBundle:Default:index.html.twig', array('name' => $name));
    }
}
