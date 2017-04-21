<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\StorageDTO;

class StorageDTOFactory implements DTOFactoryInterface
{
    public function newInstance()
    {
        $dto = new StorageDTO();
        return $dto;
    }
}
