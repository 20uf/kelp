<?php
namespace Kelp\AppBundle\Helper;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormErrorIterator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FormErrorHelper
{
    /**
     * @param FormErrorIterator $formErrorIterator
     *
     * @return string
     */
    private function getError(FormErrorIterator $formErrorIterator)
    {

        $message = [];
        foreach ($formErrorIterator as $formError) {
            /**
 * @var FormError $formError
*/
            $message[$formError->getOrigin()->getName()] = $formError->getMessage();
        }

        return $message;
    }

    /**
     * @param FormErrorIterator $formErrorIterator
     *
     * @return JsonResponse
     */
    public function jsonResponse(FormErrorIterator $formErrorIterator)
    {
        return new JsonResponse(
            ['errorMessage' => $this->getError($formErrorIterator)],
            Response::HTTP_BAD_REQUEST
        );
    }
}
