<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\Game\Prophecy\Figure\EditProphecyFigureSkillFormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class InitialiseProphecyFigureSkillFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $limit = $options['limit'];
        
        $builder
        ->add('skills', CollectionType::class, [
            'entry_type' => EditProphecyFigureSkillFormType::class,
            'allow_add' => true,
            'label' => 'competences',
            'entry_options' => [
                'label' => false, 
                'limit' => $limit 
            ],
            
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
        
        $resolver->setRequired('limit');
    }
}
