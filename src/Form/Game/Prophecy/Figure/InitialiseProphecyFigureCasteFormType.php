<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InitialiseProphecyFigureCasteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $castes = $options['castes'];
        
        $builder
            ->add('caste', ChoiceType::class, [
                'choice_label' => 'name',
                'label' => 'caste',
                'choices' => $castes,

            ])
            ->add('valider', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigure::class,
        ]);
        $resolver->setRequired('castes');
    }
}
