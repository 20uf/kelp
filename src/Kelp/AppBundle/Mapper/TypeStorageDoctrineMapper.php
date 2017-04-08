<?php
namespace Kelp\AppBundle\Mapper;

class TypeStorageDoctrineMapper extends AbstractDoctrineMapper
{
    /**
     * @param string $text
     * @return mixed
     */
    public function findBySearch(string $text = null)
    {
        return $this->getRepository()->findBySearch($text);
    }

    public function add($dto)
    {
        $typeStorage = $this->factory->newInstance($dto);
        $this->getManager()->persist($typeStorage);
        $this->getManager()->flush($typeStorage);
    }
}
