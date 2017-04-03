<?php
namespace Kelp\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SettingController
 *
 * @package Kelp\AppBundle\Controller
 */
class SettingController extends Controller
{
    /**
     * @return Response
     */
    public function typeStorageAction()
    {
        return $this->render(
            'KelpAppBundle:Setting:type_storage.html.twig',
            $this->get('kelp.type_storage.processor')->process()
        );
    }

    /**
     * @return Response
     */
    public function userAction()
    {
        return $this->render(
            'KelpAppBundle:Setting:user.html.twig',
            $this->get('kelp.user.processor')->process()
        );
    }
}
