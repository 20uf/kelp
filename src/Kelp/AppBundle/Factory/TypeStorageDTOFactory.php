<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\TypeStorageDTO;

class TypeStorageDTOFactory implements DTOFactoryInterface
{
    public function newInstance()
    {
        $dto = new TypeStorageDTO();
        return $dto;
    }
}
