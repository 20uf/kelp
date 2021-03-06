<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends Controller
{
    /**
     * @return Response
     * @throws \LogicException
     */
    public function homeAction():Response
    {
        return $this->render('home/home.html.twig');
    }
}
