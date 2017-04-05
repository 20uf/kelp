<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Factory\FactoryInterface;
use Kelp\AppBundle\Mapper\UserMapperInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class AbstractFormListener implements ListenerInterface
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
     * @var UserMapperInterface
     */
    protected $userMapper;
    /**
     * @var Request
     */
    protected $request;

    /**
     * SearchUserFormListener constructor.
     *
     * @param FactoryInterface     $dtoFactory
     * @param FormFactoryInterface $formFactory
     * @param UserMapperInterface  $userMapper
     * @param Request              $request
     */
    public function __construct(
        FactoryInterface $dtoFactory,
        FormFactoryInterface $formFactory,
        UserMapperInterface  $userMapper,
        Request              $request
    ) {
        $this->dtoFactory  = $dtoFactory;
        $this->formFactory = $formFactory;
        $this->userMapper  = $userMapper;
        $this->request     = $request;
    }

    public function onProcess(GenericEvent $event)
    {
    }
}
