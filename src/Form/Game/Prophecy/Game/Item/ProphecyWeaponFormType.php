<?php

namespace App\Form\Game\Prophecy\Game\Item;

use App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecyWeaponFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('weight', IntegerType::class)
            ->add('creationDifficulty', IntegerType::class)
            ->add('constructionDelay', IntegerType::class)
            ->add('villageRarety', TextType::class)
            ->add('cityRarety', TextType::class)
            ->add('villagePrice', IntegerType::class)
            ->add('cityPrice', IntegerType::class)      
            ->add('meleeInitiative', IntegerType::class)
            ->add('contactInitiative', IntegerType::class)
            ->add('special', TextType::class)
            ->add('damages', TextType::class)
            ->add('description', TextareaType::class)
            ->add('caracRequirement1', EntityType::class, [
                'class' => ProphecyCaracteristic::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'required' => false,
            ])
            ->add('valueRequirement1', IntegerType::class, [
                'required' => false,
            ])
            ->add('caracRequirement2', EntityType::class, [
                'class' => ProphecyCaracteristic::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'required' => false,
            ])
            ->add('valueRequirement2', IntegerType::class, [
                'required' => false,
            ])
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
            'data_class' => ProphecyWeapon::class,
        ]);
    }
}
