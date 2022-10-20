<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureDisadvantage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddProphecyFigureDisadvantageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //$ageDisadvantagesList = $options['ageDisadvantagesList'];
        $builder
            
            ->add('disadvantage', EntityType::class, [
                'label' => 'désavantage',
                'class' => ProphecyDisadvantage::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])
            /*
            >add('disadvantage', ChoiceType::class, [
                'label' => 'désavantage',
                'choices' => $prohibiteds,
                'choice_label' => 'name',
            ])
            */
            ->add('comment', TextType::class, [
                'required' => false,
            ])
            
            ->add('valider', SubmitType::class )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureDisadvantage::class,
        ]);
        //$resolver->setRequired('ageDisadvantagesList');
    }
}
