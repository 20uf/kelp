<?php
namespace Kelp\AppBundle\Mapper;

interface UserMapperInterface
{
    public function findBySearch($name = null, $role = null);

    public function findAll($limit = 10);
}
