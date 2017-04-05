<?php
namespace Kelp\AppBundle\Mapper\Manager;

use Kelp\AppBundle\Mapper\AbstractDoctrineMapperInterface;

class MapperManager
{
    private $mappers = [];

    private $defaultType;

    public function __construct($defaultType)
    {
        $this->defaultType = $defaultType;
    }

    public function addMapper($type, AbstractDoctrineMapperInterface $mapper)
    {
        $this->mappers[$type] = $mapper;
    }

    public function getMapper($type)
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

    public function getDefaultMapper()
    {
        return $this->getMapper($this->getDefaultType());
    }
}
