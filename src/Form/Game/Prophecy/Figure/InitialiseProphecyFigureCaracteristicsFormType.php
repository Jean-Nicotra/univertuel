<?php

namespace App\Form\Game\Prophecy\Figure;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InitialiseProphecyFigureCaracteristicsFormType extends AbstractType
{
  
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('caracteristics', CollectionType::class,[
                'entry_type' => EditProphecyCaracteristicFormType::class,
                'allow_add' => true,
                      'label' => 'caractéristiques',
                'entry_options' => ['label' => false ]
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigure::class,

        ]);
    }
}
