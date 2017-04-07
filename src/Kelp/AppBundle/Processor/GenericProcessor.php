<?php
namespace Kelp\AppBundle\Processor;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class AbstractProcessor implements ProcessorInterface
{
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * SettingTypeStorageProcessor constructor.
     *
     * @param EventDispatcher $eventDispatcher
     */
    public function __construct()
    {
        $this->dispatcher = new EventDispatcher();
    }

    /**
     * @param     $eventName
     * @param     $listener
     */
    public function addListener($eventName, $listener)
    {
        $this->dispatcher->addListener($eventName, $listener);
    }

    /**
     * @param EventSubscriberInterface $subscriber
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        $this->dispatcher->addSubscriber($subscriber);
    }

    abstract public function process();
}
