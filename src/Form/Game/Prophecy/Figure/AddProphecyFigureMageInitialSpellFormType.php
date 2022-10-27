<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureSpell;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AddProphecyFigureMageInitialSpellFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $spellsList = $options['spellsList'];
        
        $builder

            ->add('spell', ChoiceType::class, [
                'label' => 'spell',
                'choices' => $spellsList,
                'choice_label' => 'name',
            ])
            
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureSpell::class,
        ]);
        $resolver->setRequired('spellsList');
    }
}
