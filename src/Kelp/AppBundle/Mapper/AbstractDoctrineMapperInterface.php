<?php
namespace Kelp\AppBundle\Mapper;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;

abstract class AbstractDoctrineMapperInterface implements MapperInterface
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
     * UserDoctrineMapper constructor.
     *
     * @param ManagerRegistry $doctrine
     * @param string          $entityName
     */
    public function __construct(ManagerRegistry $doctrine, string $entityName)
    {
        $this->doctrine = $doctrine;

        $this->entityName = $entityName;
    }

    /**
     * @return ObjectManager
     */
    private function getManager()
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

    public function findLast($limit = 20)
    {
        return $this->getRepository()->findBy([], ['id' => 'DESC'], $limit);
    }
}
