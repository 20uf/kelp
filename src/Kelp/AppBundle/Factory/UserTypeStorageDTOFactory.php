<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 16/04/2017
 * Time: 16:21
 */

namespace Kelp\AppBundle\Factory;


use Kelp\AppBundle\DTO\UserTypeStorageDTO;

class UserTypeStorageDTOFactory implements DTOFactoryInterface
{
    public function newInstance()
    {
        $dto = new UserTypeStorageDTO();
        return $dto;
    }

}