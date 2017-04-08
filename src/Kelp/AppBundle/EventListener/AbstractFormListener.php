<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Factory\DTOFactoryInterface;
use Kelp\AppBundle\Mapper\AbstractDoctrineMapper;
use Kelp\AppBundle\Mapper\UserMapperInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractFormListener implements EventSubscriberInterface, ListenerInterface
{
    /**
     * @var DTOFactoryInterface
     */
    protected $dtoFactory;
    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;
    /**
     * @var AbstractDoctrineMapper
     */
    protected $mapper;
    /**
     * @var Request
     */
    protected $request;

    const SUBSCRIBED_EVENTS = ['process' => 'onProcess'];

    /**
     * SearchUserFormListener constructor.
     *
     * @param DTOFactoryInterface    $dtoFactory
     * @param FormFactoryInterface   $formFactory
     * @param AbstractDoctrineMapper $mapper
     * @param Request                $request
     */
    public function __construct(
        DTOFactoryInterface $dtoFactory,
        FormFactoryInterface $formFactory,
        AbstractDoctrineMapper $mapper,
        Request $request
    ) {
    
        $this->dtoFactory  = $dtoFactory;
        $this->formFactory = $formFactory;
        $this->mapper      = $mapper;
        $this->request     = $request;
    }

    /**
     * @return mixed
     */
    public static function getSubscribedEvents()
    {
        return self::SUBSCRIBED_EVENTS;
    }

    abstract public function onProcess(GenericEvent $event);
}
