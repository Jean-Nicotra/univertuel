<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EditProphecyMajorAttributeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('majorAttribute', TextType::class, ['label' => false, 'disabled' => true])
        ->add('value', ChoiceType::class, ['label' => false,
            'choices' =>[
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => 8,
                9 => 9,
                10 => 10,
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureMajorAttribute::class,
        ]);
    }
}
