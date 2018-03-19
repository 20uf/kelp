<?php
/**
 * Created by PhpStorm.
 * User: b.tarall
 * Date: 14/03/2018
 * Time: 10:15
 */

namespace App\DTO;

use App\Entity\Product;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ProductDTO
 * @package App\DTO
 */
class ProductDTO
{
    /**
     * @Assert\NotBlank()
     */
    public $quantity;

    /**
     * @Assert\NotBlank()
     */
    public $packaging;

    /**
     * @Assert\NotBlank()
     */
    public $label;

    /**
     * @Assert\Date()
     */
    public $date;

    /**
     * ProductDTO constructor.
     * @param Product $product
     */
    public function __construct(Product $product = null)
    {
        if ($product) {
            $this->quantity  = $product->getQuantity();
            $this->packaging = $product->getPackaging();
            $this->label     = $product->getLabel();
            $this->date      = $product->get();
        }
    }
}
