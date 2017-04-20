<?php
namespace Kelp\AppBundle\Mapper;

use Kelp\AppBundle\DTO\UserDTO;
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
     * @param string $id
     */
    public function delete(string $id)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($id);
        if (!$user) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $user->setEnabled(false);
        $this->getManager()->flush($user);
    }

    /**
     * @param string $id
     * @return User
     */
    public function find(string $id)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($id);
        if (!$user) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $id));
        }

        return $user;
    }

    /**
     * @param string  $id
     * @param UserDTO $dto
     */
    public function edit(string $id, UserDTO $dto)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($id);
        if (!$user) {
            throw new \LogicException(sprintf('impossible to find information for id %s', $id));
        }
        $user->setRoles($dto->roles);
        $this->getManager()->flush($user);
    }

    /**
     * @param string  $id
     * @param UserDTO $dto
     */
    public function editTypeStorages(UserDTO $dto)
    {

        $this->currentUser->setTypeStorages();
        $this->getManager()->flush($this->currentUser);
    }

    public function getTypeStorages()
    {
        return $this->currentUser->getTypeStorages()->toArray();
    }
}
