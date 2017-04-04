<?php
namespace Kelp\AppBundle\Processor;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class SettingTypeStorageProcessor
 *
 * @package Kelp\AppBundle\Processor
 */
class SettingUserProcessor implements ProcessorInterface
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * SettingTypeStorageProcessor constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return array
     */
    public function process()
    {
        $event = new GenericEvent();
        $this->eventDispatcher->dispatch('kelp.app.setting_user.processor.process', $event);

        return array_merge(
            $event->getArguments(),
            ['processor' => 'SettingUser']
        );
    }
}
