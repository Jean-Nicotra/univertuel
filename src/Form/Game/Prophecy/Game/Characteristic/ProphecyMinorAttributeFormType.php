<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;

class ProphecyMinorAttributeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'attribut mineur',
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
            ->add('xpIncrease', IntegerType::class, [
                'label' => 'coût en expérience',
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyMinorAttribute::class,
        ]);
    }
}
