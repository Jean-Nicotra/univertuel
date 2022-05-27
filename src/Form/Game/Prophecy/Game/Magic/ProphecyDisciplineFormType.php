<?php

namespace App\Form\Game\Prophecy\Game\Magic;

use App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecyDisciplineFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'discipline',
            ])
            ->add('minValue', IntegerType::class, [
                'label' => 'valeur minimale',
            ])
            ->add('maximumValue', IntegerType::class, [
                'label' => 'valeur maximale',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'description',
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyDiscipline::class,
        ]);
    }
}
