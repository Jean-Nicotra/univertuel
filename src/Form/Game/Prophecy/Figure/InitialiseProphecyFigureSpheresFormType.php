<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class InitialiseProphecyFigureSpheresFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        
        ->add('spheres', CollectionType::class, [
            'entry_type' => EditProphecyFigureSphereFormType::class,
            'allow_add' => true,
            'label' => 'sphères',
            'entry_options' => [
                'label' => false,
            ]
        ])
        
        ->add('xperience', TextType::class, [
            'disabled' => false,
            'label' => false,
            'attr' => [
                'class' => 'notVisible',
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
