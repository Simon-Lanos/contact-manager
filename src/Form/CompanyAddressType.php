<?php

namespace App\Form;

use App\Entity\CompanyAddress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            ->add('isHeadquarter')
            ->add('country')
            ->add('city')
            ->add('zipCode')
            ->add('address')
            ->add('addressComplement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompanyAddress::class,
        ]);
    }
}
