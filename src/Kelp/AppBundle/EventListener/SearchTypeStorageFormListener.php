<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Form\SearchTypeStorageType;
use Symfony\Component\EventDispatcher\GenericEvent;

class SearchTypeStorageFormListener extends AbstractFormListener
{
    const TABLE_ACTION = [
        'edit' => 'kelp.edit.type_storage',
        'delete' => 'kelp.delete.type_storage'
    ];
    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $table = $this->mapper->findLast();

        $form = $this->formFactory->create(SearchTypeStorageType::class, $this->dtoFactory->newInstance());

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if($data->text !== null) {
                $table = $this->mapper->findBySearch($data->text);
            }
        }

        $tableAction = $this->tableHelper->addTableAction($table, self::TABLE_ACTION);

        $event->setArgument('search_result', $table);
        $event->setArgument('table_action', $tableAction);
        $event->setArgument('form_search', $form->createView());
    }
}
