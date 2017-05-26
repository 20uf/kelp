<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\DTOInterface;
use Kelp\AppBundle\Entity\EntityInterface;
use Kelp\AppBundle\Exception\FactoryException;

abstract class AbstractEntityFactory implements EntityFactoryInterface
{
    const NAME_SPACE =  'Kelp\AppBundle\Entity\\';
    /**
     * @var EntityInterface
     */
    protected $entity;

    /**
     * @var DTOInterface
     */
    protected $dto;

    abstract public function setData();

    /**
     * @param DTOInterface $dto
     * @return EntityInterface
     * @throws FactoryException
     */
    public function newInstance(DTOInterface $dto)
    {
        $entity = explode('\\', get_class($dto));
        $entity = str_replace('DTO', '', end($entity));
        $className = self::NAME_SPACE . $entity;

        if (!is_a($className, EntityInterface::class, true)) {
            throw new FactoryException('');
        }
        $this->dto = $dto;
        $this->entity = new $className();
        $this->setData();

        return $this->entity;
    }
}
