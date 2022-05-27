<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;

class ProphecyCaracteristicFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'caractéristique', 
            ])
            ->add('code', TextType::class, [
                'label' => 'code caractéristique',
            ])
            ->add('minValue', IntegerType::class, [
                'label' => 'valeure minimale',
            ])
            ->add('maximumValue', IntegerType::class, [
                'label' => 'valeur maximale',
            ])
            ->add('xpIncrease', IntegerType::class, [
                'label' => 'coût en expérience',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'description',
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyCaracteristic::class,
        ]);
    }
}
