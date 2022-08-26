<?php

namespace App\Form\Game\Prophecy\Figure;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureArmor;
use App\Entity\Game\Prophecy\Game\Item\ProphecyShield;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureShield;

class AddProphecyFigureShieldFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('comment', TextType::class)
            ->add('shield', EntityType::class, [
                'label' => 'arme',
                'class' => ProphecyShield::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureShield::class,
        ]);
    }
}
