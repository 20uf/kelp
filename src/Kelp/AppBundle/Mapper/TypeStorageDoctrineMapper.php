<?php
namespace Kelp\AppBundle\Mapper;

class TypeStorageDoctrineMapper extends AbstractDoctrineMapperInterface
{
    /**
     * @param string $text
     * @return mixed
     */
    public function findBySearch(string $text = null)
    {
        return $this->getRepository()->findBySearch($text);
    }
}
