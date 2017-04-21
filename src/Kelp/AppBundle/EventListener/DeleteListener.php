<?php
namespace Kelp\AppBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class DeleteListener
 *
 * @package Kelp\AppBundle\EventListener
 */
class DeleteListener extends AbstractListener
{
    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $event->setArgument('error', '');

        $this->mapper->delete($this->request->get('id'));
    }
}
