<?php

declare(strict_types=1);

namespace App\Application\Form;

use App\Credit\Service\CreditFetcher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ApplicationType extends AbstractType
{
    public function __construct(private readonly CreditFetcher $creditFetcher)
    {
    }

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
                ]
            ])
            ->add('rate', TextType::class)
            ->add('sum')
            ->add('check', SubmitType::class, [
                'label' => 'Проверить',
            ])
            ->add('apply', SubmitType::class, [
                'label' => 'Выдать кредит',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([

        ]);
    }
}
