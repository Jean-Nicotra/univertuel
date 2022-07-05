<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\Game\Prophecy\Figure\EditProphecyFigureSkillFormType;


class InitialiseProphecyFigureSkillFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('skills', CollectionType::class, [
            'entry_type' => EditProphecyFigureSkillFormType::class,
            'allow_add' => true,
            'label' => 'competences',
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
