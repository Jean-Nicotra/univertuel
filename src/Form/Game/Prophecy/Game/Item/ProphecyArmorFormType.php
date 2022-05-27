<?php

namespace App\Form\Game\Prophecy\Game\Item;

use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory;

class ProphecyArmorFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'armure',
            ])
            ->add('category',EntityType::class, [
                'label' => 'catégorie d\'armure',
                'class' => ProphecyArmorCategory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('weight', IntegerType::class, [
                'label' => 'poids',
            ])
            ->add('createDifficulty', IntegerType::class, [
                'label' => 'difficulté de création',
            ])
            ->add('constructionTime', IntegerType::class, [
                'label' => 'temps de fabrication',
            ])
            ->add('villageRarety', TextType::class, [
                'label' => 'rareté dans un village',
            ])
            ->add('cityRarety', TextType::class, [
                'label' => 'rareté en ville',
            ])
            ->add('villagePrice', IntegerType::class, [
                'label' => 'prix en village',
            ])
            ->add('cityPrice',IntegerType::class, [
                'label' => 'prix en ville',
            ])
            ->add('protection', IntegerType::class, [
                'label' => 'protection',
            ])
            ->add('movePenalty', IntegerType::class, [
                'label' => 'pénalité de mouvement',
            ])
            ->add('material', TextType::class, [
                'label' => 'matériel de construction',
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
            'data_class' => ProphecyArmor::class,
        ]);
    }
}
