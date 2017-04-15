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

        $class = $this->getClassName();

        if (strstr($this->getClassName(), '\\')) {
            $class = explode("\\", $class);
            $class = end($class);
        }

        $builder
            ->select('user.username')
            ->from($this->getClassName(), $class);

        if ($name !== null) {
            $builder
                ->where('user.username like :name or user.email like :name')
                ->setParameter('name', '%' . $name . '%');
        }

        if ($role !== null) {
            $builder
                ->where('user.roles  :role')
                ->setParameter('role', '%' . $role . '%');
        }
        return $builder->getQuery()->getResult();
    }
}
