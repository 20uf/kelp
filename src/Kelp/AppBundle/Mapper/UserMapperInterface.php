<?php
namespace Kelp\AppBundle\Mapper;

interface UserMapperInterface
{
    public function findBySearch($name = null, $role = null);

    public function findLast($limit = 20);
}
