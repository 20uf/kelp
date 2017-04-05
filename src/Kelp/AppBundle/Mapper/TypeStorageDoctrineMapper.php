<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 05/04/2017
 * Time: 18:04
 */

namespace Kelp\AppBundle\Mapper;


class TypeStorageDoctrineMapper extends AbstractDoctrineMapperInterface
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