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
     * @var UserFactory
     */
    private $userFactory;

    /**
     * UserDoctrineMapper constructor.
     *
     * @param ManagerRegistry $doctrine
     * @param UserFactory     $userFactory
     */
    public function __construct(ManagerRegistry $doctrine, UserFactory $userFactory)
    {
        $this->doctrine = $doctrine;
        $this->userFactory = $userFactory;
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
        return $this->getManager()->getRepository('User');
    }

    /**
     * @return ManagerRegistry
     */
    public function findAll($limit = 10)
    {
        return $this->getRepository()->findBy(null, null, $limit);
    }


    public function findBySearch($name = null, $role = null)
    {
        return $this->getRepository()->findBySearch();
    }
}
