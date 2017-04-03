<?php
namespace Kelp\AppBundle\Form;

use Kelp\AppBundle\DTO\SearchUserDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchUserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextType::class)
            ->add('role', TextType::class)
            ->add('submit', SubmitType::class, ['label' => 'search']);

        $options;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data', SearchUserDTO::class);
    }
}
