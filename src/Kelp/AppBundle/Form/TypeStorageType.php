<?php
namespace Kelp\AppBundle\Form;

use Kelp\AppBundle\DTO\TypeStorageDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeStorageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'label',
                TextType::class,
                ['required' => false]
            )
            ->add(
                'comment',
                TextareaType::class,
                ['required' => false]
            );
        $options;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', TypeStorageDTO::class);
    }
}
