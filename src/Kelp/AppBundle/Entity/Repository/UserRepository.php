<?php
namespace Kelp\AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class TypeStorageRepository
 *
 * @package Kelp\AppBundle\Entity\Repository
 */
class UserRepository extends EntityRepository
{
    public function findBySearch($name = null, $role = null)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();

        $builder
            ->select('*')
            ->from($this->getClassName(), 'user');

        if ($name !== null) {
            $builder
                ->where('user.login like :name or user.email like :name')
                ->setParameter('name', '%' . $name . '%');
        }

        if ($role !== null) {
            $builder
                ->where('user.role :role')
                ->setParameter('role', '%' . $role . '%');
        }
        return $builder->getQuery()->getResult();
    }
}
