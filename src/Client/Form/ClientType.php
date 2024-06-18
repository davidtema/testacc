<?php

declare(strict_types=1);

namespace App\Client\Form;

use App\Address\Entity\Address;
use App\Client\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('surname')
            ->add('age')
            ->add('address', EntityType::class, [
                'class' => Address::class,
                'choice_label' => fn(Address $address) => $address->getZip() . ', ' . $address->getState() . ', ' . $address->getTown(),
                'placeholder' => 'Выберите адрес', // опционально
                'required' => true,
                'label' => 'Адрес',
            ])
            ->add('income')
            ->add('ssn')
            ->add('fico')
            ->add('email')
            ->add('phone')
            ->add('save', SubmitType::class, [
                'row_attr' => ['class' => 'mt-4']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
