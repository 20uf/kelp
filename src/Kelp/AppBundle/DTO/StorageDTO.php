<?php
namespace Kelp\AppBundle\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class StorageDTO
 *
 * @package Kelp\AppBundle\DTO
 */
class StorageDTO implements DTOInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/\D/")
     */
    public $label;

    /**
     * @Assert\Type("object")
     */
    public $user;

    /**
     * @Assert\Type("object")
     */
    public $typeStorage;
}
