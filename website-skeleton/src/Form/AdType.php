<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\City;
use App\Entity\Enum\AdTypeEnum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    AdTypeEnum::BUY => AdTypeEnum::BUY,
                    AdTypeEnum::SELL => AdTypeEnum::SELL,
                ]
            ])
            ->add('title')
            ->add('text')
            ->add('price', NumberType::class, [
                'required' => false,
            ])
            ->add('hidePhone', CheckboxType::class, [
                'required' => false,
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
            ])
            ->add('city', EntityType::class, [
                'class' => City::class,
            ]);
    }

    public function getBlockPrefix()
    {
        return 'app_ad';
    }
}
