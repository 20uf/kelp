<?php
namespace Kelp\AppBundle\Mapper;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
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
     * AbstractDoctrineMapper constructor.
     *
     * @param ManagerRegistry             $doctrine
     * @param string                      $entityName
     * @param EntityFactoryInterface|null $factory
     */
    public function __construct(ManagerRegistry $doctrine, string $entityName, EntityFactoryInterface $factory = null)
    {
        $this->doctrine = $doctrine;
        $this->entityName = $entityName;
        $this->factory = $factory;
    }

    /**
     * @return ObjectManager
     */
    protected function getManager()
    {
        return $this->doctrine->getManager($this->doctrine->getDefaultManagerName());
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
