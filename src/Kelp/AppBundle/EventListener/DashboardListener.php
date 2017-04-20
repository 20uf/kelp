<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 15/04/2017
 * Time: 13:58
 */

namespace Kelp\AppBundle\EventListener;


use Kelp\AppBundle\Form\UserTypeStorageType;
use Symfony\Component\EventDispatcher\GenericEvent;

class DashboardListener extends AbstractListener
{
    public function onProcess(GenericEvent $event)
    {
        $event->setArgument('type_storages', $this->mapper->getTypeStorages());
    }

}