<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Entity\Game\Campaign;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProphecyWoundFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('damages', TextType::class)
            ->add('maxWounds', IntegerType::class)
            ->add('malus', IntegerType::class)
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyWound::class,
        ]);
    }
}
