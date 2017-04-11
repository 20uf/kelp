<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Form\TypeStorageType;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class AddTypeStorageFormListener
 *
 * @package Kelp\AppBundle\EventListener
 */
class EditTypeStorageFormListener extends AbstractFormListener
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
        $id = $this->request->get('id');

        if ($form->isSubmitted() && $form->isValid()) {
            $this->mapper->edit($id, $dto);
            $error = '';
        }

        $event->setArgument('error', $error);
    }
}
