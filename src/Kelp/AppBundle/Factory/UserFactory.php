<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\Entity\User;

class UserFactory implements FactoryInterface
{
    public function newInstance()
    {
        return new User();
    }
}
