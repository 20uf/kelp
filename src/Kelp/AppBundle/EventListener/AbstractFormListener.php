<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Factory\FactoryInterface;
use Kelp\AppBundle\Mapper\AbstractDoctrineMapperInterface;
use Kelp\AppBundle\Mapper\UserMapperInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractFormListener implements ListenerInterface
{
    /**
     * @var FactoryInterface
     */
    protected $dtoFactory;
    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;
    /**
     * @var AbstractDoctrineMapperInterface
     */
    protected $mapper;
    /**
     * @var Request
     */
    protected $request;

    /**
     * SearchUserFormListener constructor.
     *
     * @param FactoryInterface                $dtoFactory
     * @param FormFactoryInterface            $formFactory
     * @param AbstractDoctrineMapperInterface $mapper
     * @param Request                         $request
     */
    public function __construct(
        FactoryInterface $dtoFactory,
        FormFactoryInterface $formFactory,
        AbstractDoctrineMapperInterface $mapper,
        Request $request
    )
    {
        $this->dtoFactory  = $dtoFactory;
        $this->formFactory = $formFactory;
        $this->mapper      = $mapper;
        $this->request     = $request;
    }

    abstract public function onProcess(GenericEvent $event);
}
