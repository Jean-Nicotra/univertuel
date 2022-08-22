<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureAdvantage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddProphecyFigureAdvantageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('advantage', EntityType::class, [
            'label' => 'avantage',
            'class' => ProphecyAdvantage::class,
            'choice_label' => 'name',
            'multiple' => false,
            'expanded' => false,
        ])
        
        ->add('valider', SubmitType::class )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureAdvantage::class,
        ]);
    }
}
