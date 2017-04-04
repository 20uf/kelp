<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\Form\SearchUserType;

class SearchUserDTOFactory implements FactoryInterface
{
    public function newInstance()
    {
        $dto = new SearchUserType();
        return $dto;
    }
}
