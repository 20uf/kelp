<?php

namespace App\Repository;

use App\DTO\StorageDTO;
use App\Entity\Storage;
use App\Entity\User;
use App\Factory\Entity\StorageFactory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class StorageRepository.
 */
class StorageRepository extends ServiceEntityRepository
{
    /** @var StorageFactory */
    private $factory;

    /**
     * StorageRepository constructor.
     *
     * @param ManagerRegistry $registry
     * @param StorageFactory  $factory
     */
    public function __construct(ManagerRegistry $registry, StorageFactory $factory)
    {
        parent::__construct($registry, Storage::class);
        $this->factory = $factory;
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function findAllByUser(User $user)
    {
        return $this->findBy(
            [
                'user' => $user,
                'active' => true,
            ]
        );
    }

    /**
     * @param StorageDTO $dto
     *
     * @throws \App\Exception\NotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\ORMInvalidArgumentException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \InvalidArgumentException
     */
    public function add(StorageDTO $dto): void
    {
        $storage = $this->factory->newInstance($dto);
        $this->getEntityManager()->persist($storage);
        $this->getEntityManager()->flush();
    }

    /**
     * @param StorageDTO $dto
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \LogicException
     */
    public function edit(StorageDTO $dto): void
    {
        /** @var Storage $storage */
        $storage = $this->find($dto->id);

        if (!$storage) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $dto->id));
        }
        $storage->setLabel($dto->label);
        $this->getEntityManager()->flush();
    }

    /**
     * @param $id
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \LogicException
     */
    public function delete($id): void
    {
        $storage = $this->find($id);

        if (!$storage) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $storage->setActive(false);

        $this->getEntityManager()->flush();
    }
}