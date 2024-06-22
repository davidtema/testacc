<?php

declare(strict_types=1);

namespace App\Client\Form;

use App\Address\Entity\Address;
use App\Client\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Имя',
            ])
            ->add('surname', TextType::class, [
                'label' => 'Фамилия',
            ])
            ->add('age', TextType::class, [
                'label' => 'Возраст',
            ])
            ->add('address', EntityType::class, [
                'class' => Address::class,
                'choice_label' => fn (Address $address) => $address->getZip().', '.$address->getState().', '.$address->getTown(),
                'placeholder' => 'Выберите адрес', // опционально
                'required' => true,
                'label' => 'Адрес',
            ])
            ->add('income', TextType::class, [
                'label' => 'Доход в месяц (доллар США)',
            ])
            ->add('ssn', TextType::class, [
                'label' => 'SSN (социальный страховой номер)',
            ])
            ->add('fico', IntegerType::class, [
                'label' => 'FICO (кредитный рейтинг)',
                'help' => 'Значение от 300 до 850',
            ])
            ->add('email')
            ->add('phone', TextType::class, [
                'label' => 'Телефон',
            ])
            ->add('save', SubmitType::class, [
                'row_attr' => ['class' => 'mt-4'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
