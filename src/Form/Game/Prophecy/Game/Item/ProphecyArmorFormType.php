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
            ->add('name', TextType::class)
            ->add('category',EntityType::class, [
                'class' => ProphecyArmorCategory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('weight', IntegerType::class)
            ->add('createDifficulty', IntegerType::class)
            ->add('constructionTime', IntegerType::class)
            ->add('villageRarety', TextType::class)
            ->add('cityRarety', TextType::class)
            ->add('villagePrice', IntegerType::class)
            ->add('cityPrice',IntegerType::class)
            ->add('protection', IntegerType::class)
            ->add('movePenalty', IntegerType::class)
            ->add('material', TextType::class)
            ->add('description', TextareaType::class)
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
            'data_class' => ProphecyArmor::class,
        ]);
    }
}
