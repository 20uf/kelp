<?php
namespace Kelp\AppBundle\Mapper;

use Kelp\AppBundle\DTO\StorageDTO;
use Kelp\AppBundle\Entity\Storage;
use Kelp\AppBundle\Entity\TypeStorage;
use Symfony\Component\Form\Exception\LogicException;

/**
 * Class StorageDoctrineMapper
 *
 * @package Kelp\AppBundle\Mapper
 */
class StorageDoctrineMapper extends AbstractDoctrineMapper
{
    /**
     * @param            $id
     * @param StorageDTO $dto
     */
    public function add($id, StorageDTO $dto)
    {
        /** @var TypeStorage $typeStorage */

        $typeStorage = $this->getManager()->getRepository('KelpAppBundle:TypeStorage')->find($id);
        if (!$typeStorage) {
            throw new LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $dto->typeStorage = $typeStorage;
        $dto->user = $this->currentUser;
        $storage = $this->factory->newInstance($dto);
        $this->getManager()->persist($storage);
        $this->getManager()->flush();
    }

    /**
     * @param String     $id
     * @param StorageDTO $dto
     */
    public function edit(string $id, StorageDTO $dto)
    {
        /** @var Storage $storage */
        $storage = $this->getRepository()->find($id);
        if (!$storage) {
            throw new LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $storage->setLabel($dto->label);
        $this->getManager()->flush();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        /** @var Storage $storage */
        $storage = $this->getRepository()->find($id);
        if (!$storage) {
            throw new LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $this->getManager()->remove($storage);
        $this->getManager()->flush();
    }
}
