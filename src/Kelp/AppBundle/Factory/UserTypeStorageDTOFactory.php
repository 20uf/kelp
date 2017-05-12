<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 16/04/2017
 * Time: 16:21
 */

namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\UserTypeStorageDTO;

/**
 * Class UserTypeStorageDTOFactory
 *
 * @package Kelp\AppBundle\Factory
 */
class UserTypeStorageDTOFactory implements DTOFactoryInterface
{
    /**
     * @return UserTypeStorageDTO
     */
    public function newInstance()
    {
        return new UserTypeStorageDTO();
    }
}
