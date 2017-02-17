<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 17/02/2017
 * Time: 03:24
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/dashboard")
 * Class DashBoardController
 * @package AppBundle\Controller
 */
class DashBoardController extends Controller
{
    /**
     * @Route("/", name="homeboard")
     */
    public function indexAction()
    {
        return $this->render('dashboard/index.html.twig');
    }
}