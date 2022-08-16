<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureProhibited;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddProphecyFigureProhibitedFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $prohibiteds = $options['prohibiteds'];
        
        $builder
        ->add('prohibited', ChoiceType::class, [
            'label' => 'interdit',
            'choices' => $prohibiteds,
            'choice_label' => 'name',
        ])
            ->add('comment', TextType::class)
            
            ->add('valider', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureProhibited::class,
        ]);
        $resolver->setRequired('prohibiteds');
    }
}
