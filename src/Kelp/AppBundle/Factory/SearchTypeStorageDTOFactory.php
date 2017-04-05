<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\SearchTypeStorageDTO;

class SearchTypeStorageDTOFactory implements FactoryInterface
{
    public function newInstance()
    {
        $dto = new SearchTypeStorageDTO();
        return $dto;
    }
}
