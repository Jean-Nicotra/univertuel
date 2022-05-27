<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecyOmenFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'augure',
            ])
            ->add('personnality', TextType::class, [
                'label' => 'personnalité',
            ])
            ->add('motivation', TextType::class, [
                'label' => 'motivation',
            ])
            ->add('quality', TextType::class, [
                'label' => 'qualité',
            ])
            ->add('fault', TextType::class, [
                'label' => 'défaut',
            ])
            ->add('valider', SubmitType::class )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyOmen::class,
        ]);
    }
}
