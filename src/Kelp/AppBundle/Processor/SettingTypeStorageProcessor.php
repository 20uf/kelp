<?php
namespace Kelp\AppBundle\Processor;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class SettingTypeStorageProcessor
 *
 * @package Kelp\AppBundle\Processor
 */
class SettingTypeStorageProcessor implements ProcessorInterface
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
        return ['processor' => 'SettingTypeStorage'];
    }
}
