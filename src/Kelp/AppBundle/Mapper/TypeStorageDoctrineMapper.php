<?php
namespace Kelp\AppBundle\Mapper;

use Kelp\AppBundle\DTO\TypeStorageDTO;
use Kelp\AppBundle\Entity\TypeStorage;

/**
 * Class TypeStorageDoctrineMapper
 *
 * @package Kelp\AppBundle\Mapper
 */
class TypeStorageDoctrineMapper extends AbstractDoctrineMapper
{
    /**
     * @param string $text
     * @return mixed
     */
    public function findBySearch(string $text = null)
    {
        $result = [];
        if($this->getRepository()->findBySearch($text) !== null) {
            $result = $this->getRepository()->findBySearch($text);
        }
        return $result;
    }

    /**
     * @param TypeStorageDTO $dto
     */
    public function add(TypeStorageDTO $dto)
    {
        $typeStorage = $this->factory->newInstance($dto);
        $this->getManager()->persist($typeStorage);
        $this->getManager()->flush($typeStorage);
    }

    /**
     * @param $id
     * @return TypeStorage
     */
    public function find($id)
    {
        /** @var TypeStorage $typeStorage */
        $typeStorage = $this->getRepository()->find($id);
        if (!$typeStorage) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $id));
        }

        return $typeStorage;
    }

    /**
     * @param                $id
     * @param TypeStorageDTO $dto
     */
    public function edit($id, TypeStorageDTO $dto)
    {
        /** @var TypeStorage $typeStorage */
        $typeStorage = $this->getRepository()->find($id);
        if (!$typeStorage) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $typeStorage->setLabel($dto->label);
        $typeStorage->setComment($dto->comment);
        $this->getManager()->flush($typeStorage);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        /** @var TypeStorage $typeStorage */
        $typeStorage = $this->getRepository()->find($id);
        if (!$typeStorage) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $typeStorage->setActive(false);
        $this->getManager()->flush($typeStorage);
    }
}
