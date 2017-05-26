<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 22/04/2017
 * Time: 10:04
 */

namespace Kelp\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TypeProduct
 *
 * @ORM\Entity(repositoryClass="Kelp\AppBundle\Entity\Repository\TypeProductRepository")
 * @ORM\Table(name="kelp_type_product")
 *
 * @package Kelp\AppBundle\Entity
 */
class TypeProduct implements EntityInterface
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
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    private $unit;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @return string
     */
    public function getUnit():string
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit(string $unit)
    {
        $this->unit = $unit;
    }
}
