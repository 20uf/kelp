<?php
namespace Kelp\AppBundle\Mapper;

use Kelp\AppBundle\Factory\UserFactory;

class UserDoctrineMapper extends AbstractDoctrineMapperInterface
{
    /**
     * @param string $name
     * @param string $role
     * @return mixed
     */
    public function findBySearch(string $name = null, string $role = null)
    {
        return $this->getRepository()->findBySearch($name, $role);
    }
}