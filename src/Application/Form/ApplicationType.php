<?php

declare(strict_types=1);

namespace App\Application\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('term', ChoiceType::class, [
                'choices' => [
                    '1 месяц' => 1,
                    '3 месяца' => 3,
                    '6 месяцев' => 6,
                    '12 месяцев' => 12,
                ],
                'label' => 'Длительность',
            ])
            ->add('rate', TextType::class, [
                'label' => 'Процентная ставка',
            ])
            ->add('sum', IntegerType::class, [
                'label' => 'Сумма',
            ])
            ->add('check', SubmitType::class, [
                'label' => 'Проверить',
                'attr' => [
                    'class' => 'btn btn-primary',
                    'style' => 'float: left; margin-right: 15px;',
                ],
            ])
            ->add('apply', SubmitType::class, [
                'label' => 'Выдать кредит',
                'attr' => [
                    'class' => 'btn btn-success',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
