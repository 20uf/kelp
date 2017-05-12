<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\SearchUserDTO;

/**
 * Class SearchUserDTOFactory
 *
 * @package Kelp\AppBundle\Factory
 */
class SearchUserDTOFactory implements DTOFactoryInterface
{
    /**
     * @return SearchUserDTO
     */
    public function newInstance()
    {
        return new SearchUserDTO();
    }
}
