<?php
namespace Kelp\AppBundle\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class SearchUserDTO implements DTOInterface
{
    /**
     *
     */
    public $text = null;

    /**
     *
     */
    public $role = null;
}
