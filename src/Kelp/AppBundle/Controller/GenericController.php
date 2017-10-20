<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 11/04/2017
 * Time: 18:31
 */

namespace Kelp\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GenericController extends Controller
{
    public function viewAction(Request $request)
    {
        $element = $request->attributes->get('element');
        $entity = $request->attributes->get('entity');
        if ($entity === null) {
            $entity = $element;
        }
        return $this->render(
            'KelpAppBundle:' . $element . ':' . $entity . '.html.twig',
            $this->get('toto.' . $entity . '.processor')->process()
        );
    }

    public function eventAction(Request $request)
    {
        $element = $request->attributes->get('entity');
        $action = $request->attributes->get('action');
        $event = $this->get('kelp.' . $action . '.'.$element.'.processor')->process();
        if ($event['error'] === '') {
            $response = '';
            if (isset($event['response'])) {
                $response = $event['response'];
            }
            return new Response($response);
        }
        return $event['error'];
    }
}
