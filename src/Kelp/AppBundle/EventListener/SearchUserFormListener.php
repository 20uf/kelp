<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Form\SearchUserType;
use Symfony\Component\EventDispatcher\GenericEvent;

class SearchUserFormListener extends AbstractFormListener
{
    const TABLE_ACTION = [
        'edit' => 'kelp.edit.user',
        'delete' => 'kelp.delete.user'
    ];

    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $table =  $this->mapper->findLast();

        $form = $this->formFactory->create(SearchUserType::class, $this->dtoFactory->newInstance());

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            if ($data->text !== null || $data->role !== null) {
                $this->mapper->findBySearch($data->text, $data->role);
            }
        }

        $tableAction = $this->tableHelper->addTableAction($table, self::TABLE_ACTION);

        $event->setArgument('search_result', $table);

        $event->setArgument('table_action', $tableAction);
        $event->setArgument('form_search', $form->createView());
    }
}
