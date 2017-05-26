<?php
namespace Kelp\AppBundle\Factory;

use Kelp\AppBundle\DTO\DTOInterface;

interface EntityFactoryInterface
{
    public function newInstance(DTOInterface $dto);
}
