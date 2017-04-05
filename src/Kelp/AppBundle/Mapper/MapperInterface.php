<?php
namespace Kelp\AppBundle\Mapper\Manager;

/**
 * Interface MapperInterface
 *
 * @package Kelp\AppBundle\Mapper\Manager
 */
interface MapperInterface
{
    public function add();

    public function findLast($limit = 20);
}
