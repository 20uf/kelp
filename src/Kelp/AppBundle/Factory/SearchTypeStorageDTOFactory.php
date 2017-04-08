<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\SearchTypeStorageDTO;

class SearchTypeStorageDTOFactory implements DTOFactoryInterface
{
    public function newInstance()
    {
        $dto = new SearchTypeStorageDTO();
        return $dto;
    }
}
