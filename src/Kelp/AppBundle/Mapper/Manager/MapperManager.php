<?php
namespace Kelp\AppBundle\Mapper\Manager;

use Kelp\AppBundle\Mapper\AbstractDoctrineMapper;

class MapperManager
{
    /**
     * @var array
     */
    private $mappers = [];

    /**
     * @var string
     */
    private $defaultType;

    /**
     * MapperManager constructor.
     *
     * @param string $defaultType
     */
    public function __construct(string $defaultType)
    {
        $this->defaultType = $defaultType;
    }

    /**
     * @param string                 $type
     * @param string                 $entity
     * @param AbstractDoctrineMapper $mapper
     */
    public function addMapper(string $type, string $entity, AbstractDoctrineMapper $mapper)
    {
        $this->mappers[$type][$entity] = $mapper;
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function getMapper(string $type)
    {
        if (!isset($this->mappers[$type])) {
            throw new \LogicException(sprintf('Mapper for %s does not exist', $type));
        }

        return $this->mappers[$type];
    }

    /**
     * @return mixed
     */
    public function getDefaultType()
    {
        return $this->defaultType;
    }

    /**
     * @return mixed
     */
    public function getDefaultMapper()
    {
        return $this->getMapper($this->getDefaultType());
    }

    /**
     * @param string $entity
     * @return mixed
     */
    public function getDefaultMapperFor(string $entity)
    {
        if (!isset($this->getMapper($this->getDefaultType())[$entity])) {
            throw new \LogicException(sprintf('Mapper for enity %s does not exist', $entity));
        }

        return $this->getMapper($this->getDefaultType())[$entity];
    }
}
