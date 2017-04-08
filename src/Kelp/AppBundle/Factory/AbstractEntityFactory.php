<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\DTOInterface;
use Kelp\AppBundle\Entity\EntityInterface;
use Kelp\AppBundle\Execption\FactoryException;

abstract class AbstractEntityFactory implements EntityFactoryInterface
{
    /**
     * @var EntityInterface
     */
    protected $entity;

    /**
     * @var DTOInterface
     */
    protected $dto;

    abstract public function setData();

    public function newInstance(DTOInterface $dto)
    {
        $entity = str_replace('DTO', '', $dto);
        $className = $this->namespace . $entity;
        if (!is_a($className, EntityInterface::class, true)) {
            throw new FactoryException('');
        }
        $this->dto = $dto;
        $this->entity = new $className();
        $this->setData();
    }
}
