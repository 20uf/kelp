<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Form\TypeStorageType;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class AddTypeStorageFormListener
 *
 * @package Kelp\AppBundle\EventListener
 */
class AddTypeStorageFormListener extends AbstractFormListener
{
    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $dto      = $this->dtoFactory->newInstance();
        $form     = $this->formFactory->create(TypeStorageType::class, $dto);
        $form->handleRequest($this->request);

        $error    = $this->formError->jsonResponse($form->getErrors(true));

        if ($form->isSubmitted() && $form->isValid()) {
            $this->mapper->add($dto);
            $error = '';
        }

        $event->setArgument('error', $error);
        $event->setArgument('form_event', $form->createView());
    }
}
