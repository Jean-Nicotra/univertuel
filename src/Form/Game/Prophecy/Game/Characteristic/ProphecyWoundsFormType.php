<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWounds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound;

class ProphecyWoundsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('wound', EntityType::class, [
                'class' => ProphecyWound::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('minsum', IntegerType::class, [
                'required' => true,
            ])
            ->add('maxsum', IntegerType::class, [
                'required' => true,
            ])
            ->add('wounds', IntegerType::class)

            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyWounds::class,
        ]);
    }
}
