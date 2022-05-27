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
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecyWeaponFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'arme',
            ])       
            ->add('weight', IntegerType::class, [
                'label' => 'poids',
            ])
            ->add('creationDifficulty', IntegerType::class, [
                'label' => 'difficulté de création',
            ])
            ->add('constructionDelay', IntegerType::class, [
                'label' => 'temps de fabrication',
            ])
            ->add('villageRarety', TextType::class, [
                'label' => 'rareté en village',
            ])
            ->add('cityRarety', TextType::class, [
                'label' => 'rareté en ville',
            ])
            ->add('villagePrice', IntegerType::class, [
                'label' => 'prix en village',
            ])
            ->add('cityPrice', IntegerType::class, [
                'label' => 'prix en ville',
            ])      
            ->add('meleeInitiative', IntegerType::class, [
                'label' => 'initiative de melée',
            ])
            ->add('contactInitiative', IntegerType::class, [
                'label' => 'initiative de contact',
            ])
            ->add('special', TextType::class, [
                'label' => 'special',
            ])
            ->add('damages', TextType::class, [
                'label' => 'dégâts',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'description', 
            ])
            ->add('caracRequirement1', EntityType::class, [
                'label' => 'caractéristique prérequise',
                'class' => ProphecyCaracteristic::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'required' => false,
            ])
            ->add('valueRequirement1', IntegerType::class, [
                'label' => 'valeur minimale de la caractéristique prérequise',
                'required' => false,
            ])
            ->add('caracRequirement2', EntityType::class, [
                'label' => 'caractéristique prérequise',
                'class' => ProphecyCaracteristic::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'required' => false,
            ])
            ->add('valueRequirement2', IntegerType::class, [
                'label' => 'valeur minimale de la caractéristique prérequise',
                'required' => false,
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
