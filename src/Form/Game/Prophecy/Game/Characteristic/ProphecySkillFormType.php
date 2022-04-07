<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Campaign\Campaign;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecySkillFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('xpIncrease', IntegerType::class)
            ->add('cost', IntegerType::class)
            ->add('reserved', CheckboxType::class, [
                'required' =>false
            ])
            ->add('free', CheckboxType::class, [
                'required' => false,
            ])
            ->add('forbidden', CheckboxType::class, [
                'required' => false,
            ])
            ->add('maximumValue', IntegerType::class)
            ->add('minValue', IntegerType::class)
            ->add('available', CheckboxType::class, [
                'required' => false,
            ])
            ->add('display', CheckboxType::class, [
                'required' => false,
            ])
            ->add('skillCategory', EntityType::class, [
                'class' => ProphecySkillCategory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('campaign', EntityType::class, [
                'class' => Campaign::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('description', TextareaType::class)
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecySkill::class,
        ]);
    }
}
