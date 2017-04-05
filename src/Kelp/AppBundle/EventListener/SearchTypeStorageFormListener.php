<?php
namespace Kelp\AppBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

class SearchTypeStorageFormListener extends AbstractFormListener
{
    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $event->setArgument('search_result', 'test');
        //        $event->setArgument('search_result', $this->userMapper->findLast());

        //        $form = $this->formFactory->create(SearchTypeStorageType::class, $this->dtoFactory->newInstance());
        //
        //        $form->handleRequest($this->request);
        //
        //        if ($form->isSubmitted() && $form->isValid()) {
        //            $data = $form->getData();
        //            $event->setArgument('search_result', $this->userMapper->findBySearch($data->text, $data->role));
        //        }
        //
        //        $event->setArgument('form', $form->createView());
    }
}
