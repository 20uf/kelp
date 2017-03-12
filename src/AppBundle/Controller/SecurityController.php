<?php
/**
 * Created by PhpStorm.
 * User: neo
 * Date: 12/03/17
 * Time: 22:18
 */



namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class SecurityController
 * @package AppBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        //get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        //last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
           'last_username'  => $lastUsername,
            'error'         => $error
        ]);
    }

    /**
     * @Route("logout", name="logout")
     */
    public function logout()
    {

    }
}
