<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InitialiseProphecyFigureOmenFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $omenList = $options['omenList'];
        
        $builder

            ->add('omen', ChoiceType::class, [
                'label' => 'interdit',
                'choices' => $omenList,
                'choice_label' => 'name',
        ])
            ->add('valider', SubmitType::class)
        ;           
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigure::class,
        ]);
        $resolver->setRequired('omenList');
    }
}
