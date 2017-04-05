<?php
namespace Kelp\AppBundle\Processor;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AbstractProcessor implements ProcessorInterface
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * SettingTypeStorageProcessor constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function process()
    {
        return [];
    }
}
