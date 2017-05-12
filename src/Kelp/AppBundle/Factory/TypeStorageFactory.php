<?php
namespace Kelp\AppBundle\Factory;

/**
 * Class TypeStorageFactory
 *
 * @package Kelp\AppBundle\Factory
 */
class TypeStorageFactory extends AbstractEntityFactory
{
    /**
     * Help to set data in the method newInstance in AbstractEntityFactory
     */
    public function setData()
    {
        $this->entity->setLabel($this->dto->label);
        $this->entity->setClass($this->dto->class);
        $this->entity->setComment($this->dto->comment);
    }
}
