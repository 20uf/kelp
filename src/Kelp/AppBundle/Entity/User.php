<?php
// src/AppBundle/Entity/User.php

namespace Kelp\AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Kelp\AppBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */

/**
 * Class User
 *
 * @ORM\Entity(repositoryClass="Kelp\AppBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 * @package                                                                       Kelp\AppBundle\Entity
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}
