<?php

namespace Kelp\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('KelpAppBundle:Dashboard:index.html.twig');
    }
}
