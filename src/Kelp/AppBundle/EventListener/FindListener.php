<?php
namespace Kelp\AppBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

class FindListener extends AbstractListener
{
    public function onProcess(GenericEvent $event)
    {
        $event->setArgument('error', '');

        $response = $this->mapper->find($this->request->get('id'));

        $event->setArgument('response', $this->serializer->serialize($response, 'json'));
    }
}
