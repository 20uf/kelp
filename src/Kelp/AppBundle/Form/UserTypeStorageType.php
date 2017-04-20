<?php
/**
 * Created by PhpStorm.
 * User: groot
 * Date: 15/04/2017
 * Time: 19:07
 */

namespace Kelp\AppBundle\Form;


use Doctrine\ORM\EntityRepository;
use Kelp\AppBundle\DTO\UserTypeStorageDTO;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserTypeStorageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'label',
            EntityType::class,
            [
                'class'    => 'Kelp\AppBundle\Entity\TypeStorage',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('ts')
                        ->where('ts.active =  true')
                              ->orderBy('ts.label', 'ASC');
                },
                'choice_label' => 'label',
                'multiple' => true,
                'expanded' => true,
            ]
        );

        $options;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', UserTypeStorageDTO::class);
    }
}