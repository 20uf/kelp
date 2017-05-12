<?php
namespace Kelp\AppBundle\Mapper;

use Kelp\AppBundle\DTO\UserDTO;
use Kelp\AppBundle\DTO\UserTypeStorageDTO;
use Kelp\AppBundle\Entity\User;

class UserDoctrineMapper extends AbstractDoctrineMapper
{
    /**
     * @param string $text
     * @param string $role
     * @return mixed
     */
    public function findBySearch(string $text = null, string $role = null)
    {
        $result = [];
        if ($this->getRepository()->findBySearch($text, $role) !== null) {
            $result = $this->getRepository()->findBySearch($text, $role);
        }

        return $result;
    }

    /**
     * @param integer $limit
     * @return mixed
     */
    public function findLast($limit = 20)
    {
        return $this->getRepository()->findBy(['enabled' => true], ['id' => 'DESC'], $limit);
    }

    /**
     * @param string $idUser
     */
    public function delete(string $idUser)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($idUser);
        if (!$user) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $idUser));
        }
        $user->setEnabled(false);
        $this->getManager()->flush();
    }

    /**
     * @param string $idUser
     * @return User
     */
    public function find(string $idUser)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($idUser);
        if (!$user) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $idUser));
        }

        return $user;
    }

    /**
     * @param string  $idUser
     * @param UserDTO $dto
     */
    public function edit(string $idUser, UserDTO $dto)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($idUser);
        if (!$user) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $idUser));
        }
        $user->setRoles($dto->roles);
        $this->getManager()->flush();
    }

    /**
     * @param UserTypeStorageDTO $dto
     */
    public function editTypeStorages(UserTypeStorageDTO $dto)
    {
        $this->currentUser->setTypeStorages($dto->label);
        $this->getManager()->flush();
    }

    public function getTypeStorages()
    {
        return $this->currentUser->getTypeStorages()->toArray();
    }

    public function getStorages()
    {
        return $this->currentUser->getStorages()->toArray();
    }
}
