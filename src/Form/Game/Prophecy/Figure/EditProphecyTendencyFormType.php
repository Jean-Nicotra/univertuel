<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency;

class EditProphecyTendencyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('tendency', TextType::class, [
            'label' => false, 'disabled' => true
            
        ])
        ->add('tendencyValue', IntegerType::class, [
            'label' => false,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureTendency::class,
        ]);
    }
}
