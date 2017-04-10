<?php
namespace Kelp\AppBundle\Mapper;

use Kelp\AppBundle\Entity\TypeStorage;

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

    public function delete($id)
    {
        /**
 * @var TypeStorage $typeStorage
*/
        $typeStorage = $this->getRepository()->find($id);
        if (!$typeStorage) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $typeStorage->setActive(false);
        $this->getManager()->flush($typeStorage);
    }
}
