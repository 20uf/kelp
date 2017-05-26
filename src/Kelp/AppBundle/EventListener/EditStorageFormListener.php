<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 16/04/2017
 * Time: 16:28
 */

namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Form\StorageType;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class EditStorageFormListener
 *
 * @package Kelp\AppBundle\EventListener
 */
class EditStorageFormListener extends AbstractFormListener
{
    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $dto      = $this->dtoFactory->newInstance();
        $form     = $this->formFactory->create(StorageType::class, $dto);
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
