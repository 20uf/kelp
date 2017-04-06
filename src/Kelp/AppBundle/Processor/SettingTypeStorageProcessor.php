<?php
namespace Kelp\AppBundle\Processor;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class SettingTypeStorageProcessor
 *
 * @package Kelp\AppBundle\Processor
 */
class SettingTypeStorageProcessor extends AbstractProcessor
{
    /**
     * @return array
     */
    public function process()
    {
        $event = new GenericEvent();
        $this->eventDispatcher->dispatch('kelp.app.setting_type_storage.processor.process', $event);

        return $event->getArguments();
    }
}
