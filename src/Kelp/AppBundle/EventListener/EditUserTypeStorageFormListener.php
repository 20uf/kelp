<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 16/04/2017
 * Time: 16:28
 */

namespace Kelp\AppBundle\EventListener;


use Kelp\AppBundle\Form\UserTypeStorageType;
use Symfony\Component\EventDispatcher\GenericEvent;

class EditUserTypeStorageFormListener extends AbstractFormListener
{
    public function onProcess(GenericEvent $event)
    {
        $dto      = $this->dtoFactory->newInstance();
        $form     = $this->formFactory->create(UserTypeStorageType::class, $dto);
        $form->handleRequest($this->request);

        $error    = $this->formError->jsonResponse($form->getErrors(true));
        $id = $this->request->get('id');

        if ($form->isSubmitted() && $form->isValid()) {
            $this->mapper->edit($dto);
//            $error = '';
        }

        $event->setArgument('form_edit', $form->createView());
        $event->setArgument('error', $error);
    }

}