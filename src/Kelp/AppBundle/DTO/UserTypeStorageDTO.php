<?php
namespace Kelp\AppBundle\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserTypeStorageDTO
 *
 * @package Kelp\AppBundle\DTO
 */
class UserTypeStorageDTO implements DTOInterface
{
    /**
     * @Assert\NotBlank()
     */
    //* @Assert\Type("ArrayCollection")
    public $label = [];
}
