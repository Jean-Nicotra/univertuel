<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;

class InitialiseProphecyFigureDisadvantagesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //$disadvantagesList = $options['disadvantagesList']; 
        
        $builder
        
        ->add('disadvantages', CollectionType::class, [
            'entry_type' => EditProphecyDisadvantageFormType::class,
            'allow_add' => true,
            'entry_options' => ['label' => false ]
        ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigure::class,
        ]);
    }
}
