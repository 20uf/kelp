<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\SearchUserDTO;

class SearchUserDTOFactory implements FactoryInterface
{
    public function newInstance()
    {
        $dto = new SearchUserDTO();
        return $dto;
    }
}
