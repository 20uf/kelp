<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Form\SearchTypeStorageType;
use Symfony\Component\EventDispatcher\GenericEvent;

class SearchTypeStorageFormListener extends AbstractFormListener
{
    const TABLE_ACTION = [
        'edit' => 'kelp_delete_setting_type_storage',
        'delete' => 'kelp_delete_setting_type_storage'
    ];
    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $table = $this->mapper->findLast();

        $event->setArgument('search_result', $table);

        $form = $this->formFactory->create(SearchTypeStorageType::class, $this->dtoFactory->newInstance());

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if($data->text !== null) {
                $table = $this->mapper->findBySearch($data->text);
            }

            $event->setArgument('search_result', $table);
        }

        $tableAction = $this->tableHelper->addTableAction($table, self::TABLE_ACTION);

        $event->setArgument('table_action', $tableAction);
        $event->setArgument('form_search', $form->createView());
    }
}
