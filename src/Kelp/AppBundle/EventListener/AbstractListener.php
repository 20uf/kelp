<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Mapper\AbstractDoctrineMapper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractListener implements EventSubscriberInterface, ListenerInterface
{
    /**
     * @const array
     */
    const SUBSCRIBED_EVENTS = ['process' => 'onProcess'];

    /**
     * @var AbstractDoctrineMapper
     */
    protected $mapper;

    /**
     * @var Request
     */
    protected $request;

    /**
     * SearchUserFormListener constructor.
     *
     * @param AbstractDoctrineMapper $mapper
     * @param Request                $request
     */
    public function __construct(AbstractDoctrineMapper $mapper, Request $request)
    {
        $this->mapper      = $mapper;
        $this->request     = $request;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return self::SUBSCRIBED_EVENTS;
    }

    abstract public function onProcess(GenericEvent $event);
}
