<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Form\TypeStorageType;
use Symfony\Component\EventDispatcher\GenericEvent;

class AddTypeStorageFormListener extends AbstractFormListener
{
    public function onProcess(GenericEvent $event)
    {
        $form = $this->formFactory->create(TypeStorageType::class, $this->dtoFactory->newInstance());

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->mapper->add($data);
        }

        $event->setArgument('form_add', $form->createView());
    }
}
