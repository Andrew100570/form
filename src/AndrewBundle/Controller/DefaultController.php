<?php

namespace AndrewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AndrewBundle:Default:index.html.twig');
    }
}
