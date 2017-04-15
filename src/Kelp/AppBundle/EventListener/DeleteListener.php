<?php
namespace Kelp\AppBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

class DeleteListener extends AbstractListener
{
    public function onProcess(GenericEvent $event)
    {
        $event->setArgument('error', '');

        $this->mapper->delete($this->request->get('id'));
    }
}
