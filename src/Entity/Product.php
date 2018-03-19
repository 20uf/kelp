<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="kelp_product")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $quantity;

    /**
     * @ORM\OneToMany(targetEntity="Packaging", mappedBy="product")
     **/
    private $packaging;

    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    private $label;

    /**
     * @ORM\OneToOne(targetEntity="Storage")
     * @ORM\JoinColumn(name="storage_id", referencedColumnName="id")
     **/
    private $storage;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     **/
    private $active;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * @param mixed $packaging
     */
    public function setPackaging($packaging): void
    {
        $this->packaging = $packaging;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param mixed $storage
     */
    public function setStorage($storage): void
    {
        $this->storage = $storage;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }


}
