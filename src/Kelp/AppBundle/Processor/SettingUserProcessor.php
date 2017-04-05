<?php
namespace Kelp\AppBundle\Processor;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class SettingTypeStorageProcessor
 *
 * @package Kelp\AppBundle\Processor
 */
class SettingUserProcessor extends AbstractProcessor
{
    /**
     * @return array
     */
    public function process()
    {
        $event = new GenericEvent();
        $this->eventDispatcher->dispatch('kelp.app.setting_user.processor.process', $event);

        return $event->getArguments();
    }
}
