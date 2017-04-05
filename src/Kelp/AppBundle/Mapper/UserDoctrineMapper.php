<?php
namespace Kelp\AppBundle\Mapper;

use Doctrine\Common\Persistence\ManagerRegistry;
use Kelp\AppBundle\Factory\UserFactory;
use \Doctrine\Common\Persistence\ObjectManager;

class UserDoctrineMapper implements UserMapperInterface
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    /**
     * UserDoctrineMapper constructor.
     *
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return ObjectManager
     */
    private function getManager()
    {
        return $this->doctrine->getManager($this->doctrine->getDefaultManagerName());
    }

    /**
     * @return \Kelp\AppBundle\Entity\Repository\UserRepository
     */
    private function getRepository()
    {
        return $this->getManager()->getRepository('KelpAppBundle:User');
    }


    public function findLast($limit = 20)
    {
        return $this->getRepository()->findBy([], ['id' => 'DESC'], $limit);
    }


    public function findBySearch($name = null, $role = null)
    {
        return $this->getRepository()->findBySearch();
    }
}
