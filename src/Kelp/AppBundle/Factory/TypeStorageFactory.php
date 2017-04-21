<?php
namespace Kelp\AppBundle\Factory;

class TypeStorageFactory extends AbstractEntityFactory
{
    public function setData()
    {
        $this->entity->setLabel($this->dto->label);
        $this->entity->setClass($this->dto->class);
        $this->entity->setComment($this->dto->comment);
    }
}
