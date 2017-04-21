<?php
namespace Kelp\AppBundle\Factory;

class StorageFactory extends AbstractEntityFactory
{
    public function setData()
    {
        $this->entity->setLabel($this->dto->label);
        $this->entity->setUser($this->dto->user);
        $this->entity->setTypeStorage($this->dto->typeStorage);
    }
}
