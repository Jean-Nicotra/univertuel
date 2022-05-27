<?php

namespace App\Form\Game\Prophecy\Game\World;

use App\Entity\Game\Prophecy\Game\World\ProphecyCurrency;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProphecyCurrencyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'monnaie',
            ])
            ->add('factorValue', IntegerType::class, [
                'label' => 'valeur',
            ])
            ->add('available', CheckboxType::class, [
                'label' => 'disponible',
                'required' => false,
            ])
            ->add('display', CheckboxType::class, [
                'label' => 'affichable',
                'required' => false,
            ])
            ->add('code', TextType::class, [
                'label' => 'code',
            ])
            ->add('description',TextareaType::class, [
                'label' => 'description',
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyCurrency::class,
        ]);
    }
}
