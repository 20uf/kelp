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
    public function addTypeStorageAction()
    {
        $event = $this->get('kelp.add_type_storage.processor')->process();
        if ($event['form_add_error'] === '') {
            return new Response();
        }
        return $event['form_add_error'];
    }

    /**
     * @return Response
     */
    public function editTypeStorageAction()
    {
        $event = $this->get('kelp.edit_type_storage.processor')->process();
        if ($event['form_edit_error'] === '') {
            return new Response();
        }
        return $event['form_edit_error'];
    }

    /**
     * @return Response
     */
    public function deleteTypeStorageAction()
    {
        $event = $this->get('kelp.delete_type_storage.processor')->process();
        if ($event['error'] === '') {
            return new Response();
        }
        return $event['error'];
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
