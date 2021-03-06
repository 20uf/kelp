<?php
/**
 * Created by PhpStorm.
 * User: b.tarall
 * Date: 22/02/2018
 * Time: 12:24
 */

namespace App\FormHandler;

use Symfony\Component\Form\FormInterface;

trait FormHandlerTrait
{
    /**
     * @var FormInterface
     */
    protected $form;

    /**
     * Get generated form.
     *
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }
}
