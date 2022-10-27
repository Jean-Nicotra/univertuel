<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Game\Prophecy\Game\ProphecyStartCaracteristic;

class EditProphecyCaracteristicFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        
            ->add('caracteristic', TextType::class, [
                'label' => false, 
                'disabled' => true,
                
            ])
            
            ->add('value', ChoiceType::class, [
                'label' => false,  
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 0,
                'attr' => [
                    'lastValue' => "",  
                ],
                'choices' => [
                    
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,   
                ]              
            ])
        ;
        

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureCaracteristic::class,
        ]);
    }
}
