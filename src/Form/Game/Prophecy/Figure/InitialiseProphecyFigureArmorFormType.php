<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;

class InitialiseProphecyFigureArmorFormType extends AbstractType
{ 
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('armors', CollectionType::class,
            [
                'entry_type' => AddProphecyFigureArmorFormType::class,
                'allow_add' => true,
                'label' => 'armure',
                'entry_options' => [
                    'label' => false 
                ]
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
