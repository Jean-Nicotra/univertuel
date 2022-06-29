<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureDisadvantage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EditProphecyDisadvantageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        //$disadvantagesList = $options['disadvantagesList']; 
        
        $builder
        
            ->add('disadvantages', EntityType::class, [
                'class' => ProphecyDisadvantage::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            /*
        ->add('disadvantages', ChoiceType::class, [
            'label' => 'désavantages',
            'choices' => $disadvantagesList,
            'choice_label' => 'name',
        ])
        */
            
            ->add('valider', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigure::class,
            
        ]);
        //$resolver->setRequired('disadvantagesList');
    }
}
