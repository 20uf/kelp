<?php
namespace Kelp\AppBundle\Mapper\Manager;

use Kelp\AppBundle\Mapper\UserMapperInterface;

class UserMapperManager
{
    private $mappers = [];

    private $defaultType;

    public function __construct($defaultType)
    {
        $this->defaultType = $defaultType;
    }

    public function addMapper($type, UserMapperInterface $mapper)
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
        //        dump($this->getDefaultType());

        return $this->getMapper($this->getDefaultType());
    }
}
