<?php
namespace Kelp\AppBundle\Factory;

/**
 * Class StorageFactory
 *
 * @package Kelp\AppBundle\Factory
 */
class StorageFactory extends AbstractEntityFactory
{
    /**
     * Help to set data in the method newInstance in AbstractEntityFactory
     */
    public function setData()
    {
        $this->entity->setLabel($this->dto->label);
        $this->entity->setUser($this->dto->user);
        $this->entity->setTypeStorage($this->dto->typeStorage);
    }
}
