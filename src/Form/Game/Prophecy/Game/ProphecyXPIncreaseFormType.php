<?php

namespace App\Form\Game\Prophecy\Game;

use App\Entity\Game\Prophecy\Game\ProphecyXPIncrease;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;

class ProphecyXPIncreaseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('caracteristic', IntegerType::class)
            ->add('majorAttribute', IntegerType::class)
            ->add('minorAttribute', IntegerType::class)
            ->add('reservedSkill', IntegerType::class)
            ->add('skill', IntegerType::class)
            ->add('forbiddenSkill', IntegerType::class)
            ->add('mana', IntegerType::class)
            ->add('spell', IntegerType::class)
            ->add('famous', IntegerType::class)
            ->add('favour', IntegerType::class)
            ->add('advantage', IntegerType::class)
            ->add('disadvantage', IntegerType::class)
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
            'data_class' => ProphecyXPIncrease::class,
        ]);
    }
}
