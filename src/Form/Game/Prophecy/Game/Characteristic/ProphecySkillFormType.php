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
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecySkillFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'compétence',
            ])
            ->add('xpIncrease', IntegerType::class, [
                'label' => 'coût en expérience',
            ])
            ->add('cost', IntegerType::class, [
                'label' => 'cout',
            ])
            ->add('reserved', CheckboxType::class, [
                'label' => 'réservée',
                'required' =>false
            ])
            ->add('free', CheckboxType::class, [
                'label' => 'commune',
                'required' => false,
            ])
            ->add('forbidden', CheckboxType::class, [
                'label' => 'interdite',
                'required' => false,
            ])
            ->add('minValue', IntegerType::class, [
                'label' => 'valeur minimale',
            ])
            ->add('maximumValue', IntegerType::class, [
                'label' => 'valeur maximale',
            ])
            ->add('available', CheckboxType::class, [
                'label' => 'disponible',
                'required' => false,
            ])
            ->add('display', CheckboxType::class, [
                'label' => 'imprimable',
                'required' => false,
            ])
            ->add('skillCategory', EntityType::class, [
                'label' => 'catégorie de compétence',
                'class' => ProphecySkillCategory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
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
            'data_class' => ProphecySkill::class,
        ]);
    }
}
