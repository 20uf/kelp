<?php
namespace Kelp\AppBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

interface ListenerInterface
{
    public function onProcess(GenericEvent $event);
}
