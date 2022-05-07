<?php

namespace App\Form\Game\Prophecy\Game;

use App\Entity\Game\Prophecy\Game\ProphecyStartCaracteristic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;

class ProphecyStartCaracteristicsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('value1', IntegerType::class)
            ->add('value2', IntegerType::class)
            ->add('value3', IntegerType::class)
            ->add('value4', IntegerType::class)
            ->add('value5', IntegerType::class)
            ->add('value6', IntegerType::class)
            ->add('value7', IntegerType::class)
            ->add('value8', IntegerType::class)
            ->add('campaign', EntityType::class, [
                'class' => Campaign::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyStartCaracteristic::class,
        ]);
    }
}
