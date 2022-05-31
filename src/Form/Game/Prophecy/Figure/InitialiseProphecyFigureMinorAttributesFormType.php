<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InitialiseProphecyFigureMinorAttributesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('minorAttributes', CollectionType::class,
                [
                    'entry_type' => EditProphecyMinorAttributeFormType::class,
                    'allow_add' => true,
                    'label' => 'attributs mineurs',
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
