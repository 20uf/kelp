<?php
namespace Kelp\AppBundle\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class SearchUserDTO
{
    /**
     * @Assert\();
     */
    public $text = null;

    /**
     *
     */
    public $role = null;
}
