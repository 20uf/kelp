<?php
namespace Kelp\AppBundle\Mapper;

class UserDoctrineMapper extends AbstractDoctrineMapper
{
    /**
     * @param string $text
     * @param string $role
     * @return mixed
     */
    public function findBySearch(string $text = null, string $role = null)
    {
        return $this->getRepository()->findBySearch($text, $role);
    }
}
