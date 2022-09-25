<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureFavour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AddProphecyFigureInitialFavourFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $favoursList = $options['favoursList'];
        
        $builder

            ->add('favour', ChoiceType::class, [
                'label' => 'interdit',
                'choices' => $favoursList,
                'choice_label' => 'name',
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureFavour::class,
        ]);
        $resolver->setRequired('favoursList');
    }
}
