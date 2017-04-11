<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Mapper\AbstractDoctrineMapper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;

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
     * @var Serializer
     */
    protected $serializer;

    /**
     * AbstractListener constructor.
     *
     * @param AbstractDoctrineMapper $mapper
     * @param Request                $request
     * @param Serializer             $serializer
     */
    public function __construct(AbstractDoctrineMapper $mapper, Request $request, Serializer $serializer = null)
    {
        $this->mapper      = $mapper;
        $this->request     = $request;
        $this->serializer  = $serializer;

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
