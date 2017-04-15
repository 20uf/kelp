<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 07/04/2017
 * Time: 16:01
 */

namespace Kelp\AppBundle\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class UserDTO implements DTOInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Type("array")
     */
    public  $roles;
}
