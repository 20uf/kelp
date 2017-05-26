<?php
namespace Kelp\AppBundle\Mapper;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Kelp\AppBundle\Entity\User;
use Kelp\AppBundle\Factory\EntityFactoryInterface;

abstract class AbstractDoctrineMapper implements MapperInterface
{
    /**
     * @var ManagerRegistry
     */
    protected $doctrine;

    /**
     * @var string
     */
    protected $entityName;

    /**
     * @var string
     */
    protected $factory;

    /**
     * @var string
     */
    protected $currentUser;

    /**
     * @return ObjectManager
     */
    protected function getManager()
    {
        return $this->doctrine->getManager($this->doctrine->getDefaultManagerName());
    }

    /**
     * AbstractDoctrineMapper constructor.
     *
     * @param ManagerRegistry             $doctrine
     * @param string                      $entityName
     * @param EntityFactoryInterface|null $factory
     * @param User                        $user
     */
    public function __construct(
        ManagerRegistry         $doctrine,
        string                  $entityName,
        EntityFactoryInterface  $factory = null,
        User                    $user = null
    ) {
    
        $this->doctrine    = $doctrine;
        $this->entityName  = $entityName;
        $this->factory     = $factory;
        $this->currentUser = $user;
    }

    /**
     * @return mixed
     */
    protected function getRepository()
    {
        return $this->getManager()->getRepository($this->entityName);
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function findLast($limit = 20)
    {
        return $this->getRepository()->findBy(['active' => true], ['id' => 'DESC'], $limit);
    }
}
