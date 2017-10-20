<?php
namespace Kelp\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Storage
 *
 * @ORM\Entity(repositoryClass="Kelp\AppBundle\Entity\Repository\StorageRepository")
 * @ORM\Table(name="kelp_storage")
 *
 * @package Kelp\AppBundle\Entity
 */
class Storage implements EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="storages")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="storage")
     * @ORM\JoinColumn(name="type_storage_id", referencedColumnName="id")
     **/
    private $typeStorage;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel():string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getTypeStorage()
    {
        return $this->typeStorage;
    }

    /**
     * @param mixed $typeStorage
     */
    public function setTypeStorage($typeStorage)
    {
        $this->typeStorage = $typeStorage;
    }
}
