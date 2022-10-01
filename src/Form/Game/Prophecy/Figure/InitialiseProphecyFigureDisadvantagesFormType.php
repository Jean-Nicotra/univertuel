<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureDisadvantage;

class InitialiseProphecyFigureDisadvantagesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        
        ->add('disadvantages', CollectionType::class, [
            'entry_type' => EditProphecyDisadvantageFormType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'entry_options' => [
                'label' => false 
            ]
        ])
        
        ->add('valider', SubmitType::class)
        ;
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigure::class,
        ]);
    }
}
