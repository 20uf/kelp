<?php
namespace Kelp\AppBundle\DTO;

/**
 * Class UserTypeStorageDTO
 *
 * @package Kelp\AppBundle\DTO
 */
class UserTypeStorageDTO implements DTOInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Type("array")
     */
    public $label = [];
}