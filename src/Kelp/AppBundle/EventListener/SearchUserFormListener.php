<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Form\SearchUserType;
use Symfony\Component\EventDispatcher\GenericEvent;

class SearchUserFormListener extends AbstractFormListener
{
    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $event->setArgument('search_result', $this->mapper->findLast());

        $form = $this->formFactory->create(SearchUserType::class, $this->dtoFactory->newInstance());

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $event->setArgument('search_result', $this->mapper->findBySearch($data->text, $data->role));
        }

        $event->setArgument('form', $form->createView());
    }
}
