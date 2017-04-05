<?php
namespace Kelp\AppBundle\EventListener;

use Kelp\AppBundle\Factory\SearchUserDTOFactory;
use Kelp\AppBundle\Form\SearchUserType;
use Kelp\AppBundle\Mapper\UserMapperInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Form\FormFactoryInterface;

class SearchUserFormListener implements ListenerInterface
{
    /**
     * @var SearchUserDTOFactory
     */
    private $dtoFactory;
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var UserMapperInterface
     */
    private $userMapper;
    /**
     * @var Request
     */
    private $request;

    /**
     * SearchUserFormListener constructor.
     *
     * @param SearchUserDTOFactory $dtoFactory
     * @param FormFactoryInterface $formFactory
     * @param UserMapperInterface  $userMapper
     * @param Request              $request
     */
    public function __construct(
        SearchUserDTOFactory $dtoFactory,
        FormFactoryInterface $formFactory,
        UserMapperInterface  $userMapper,
        Request              $request
    ) {
    
        $this->dtoFactory  = $dtoFactory;
        $this->formFactory = $formFactory;
        $this->userMapper  = $userMapper;
        $this->request     = $request;
    }

    /**
     * @param GenericEvent $event
     */
    public function onProcess(GenericEvent $event)
    {
        $event->setArgument('search_result', $this->userMapper->findLast());

        $form = $this->formFactory->create(SearchUserType::class, $this->dtoFactory->newInstance());

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $event->setArgument('search_result', $this->userMapper->findBySearch($data->text, $data->role));
        }

        $event->setArgument('form', $form->createView());
    }
}
