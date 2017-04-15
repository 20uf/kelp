<?php
namespace Kelp\AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class TypeStorageRepository
 *
 * @package Kelp\AppBundle\Entity\Repository
 */
class TypeStorageRepository extends EntityRepository
{
    public function findBySearch($text = null)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();

        $class = $this->getClassName();

        if (strstr($this->getClassName(), '\\')) {
            $class = explode("\\", $class);
            $class = end($class);
        }

        $builder
            ->select('type_storage.label')
            ->from($this->getClassName(), $class);

        if ($text !== null) {
            $builder
                ->where('type_storage   .label like :text')
                ->setParameter('text', '%' . $text . '%');
        }
    }
}
