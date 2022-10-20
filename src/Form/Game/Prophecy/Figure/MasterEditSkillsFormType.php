<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MasterEditSkillsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
        ->add('skill', TextType::class, [
            'label' => false,
            'disabled' => true,
            
        ])
        ->add('value', IntegerType::class, [
            'label' => false,
            'attr' => [
                'class' => 'inputSkill',
                'lastvalue' => 0,
            ],
        ])
            ->add('isDisplay', CheckboxType::class, [
                'required' => false
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureSkill::class,
        ]);
    }
}
