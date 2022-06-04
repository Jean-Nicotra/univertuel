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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited;

class EditProphecyProhibitedFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        
            ->add('name', TextType::class, [
                'label' => false, 
                'disabled' => false,       
            ])
            ->add('description', TextareaType::class, [
                'label' => false,
                'disabled' => true,
            ]) 
        ;
        

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyProhibited::class,
        ]);
    }
}
