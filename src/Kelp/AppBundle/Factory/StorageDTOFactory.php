<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\StorageDTO;

/**
 * Class StorageDTOFactory
 *
 * @package Kelp\AppBundle\Factory
 */
class StorageDTOFactory implements DTOFactoryInterface
{
    /**
     * @return StorageDTO
     */
    public function newInstance()
    {
        return new StorageDTO();
    }
}
