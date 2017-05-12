<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\SearchTypeStorageDTO;

/**
 * Class SearchTypeStorageDTOFactory
 *
 * @package Kelp\AppBundle\Factory
 */
class SearchTypeStorageDTOFactory implements DTOFactoryInterface
{
    /**
     * @return SearchTypeStorageDTO
     */
    public function newInstance()
    {
        return new SearchTypeStorageDTO();
    }
}
