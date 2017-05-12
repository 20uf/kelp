<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\TypeStorageDTO;

/**
 * Class TypeStorageDTOFactory
 *
 * @package Kelp\AppBundle\Factory
 */
class TypeStorageDTOFactory implements DTOFactoryInterface
{
    /**
     * @return TypeStorageDTO
     */
    public function newInstance()
    {
        return new TypeStorageDTO();
    }
}
