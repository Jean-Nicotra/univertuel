<?php

namespace App\Form\Game\Prophecy\Game\World;

use App\Entity\Game\Prophecy\Game\World\ProphecyNation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Campaign\Campaign;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProphecyNationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('available', CheckboxType::class, [
                'required' => false,
            ])
            ->add('display', CheckboxType::class, [
                'required' => false,
            ])
            ->add('description', TextareaType::class)
            ->add('campaign', EntityType::class, [
                'class' => Campaign::class,
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
            'data_class' => ProphecyNation::class,
        ]);
    }
}
