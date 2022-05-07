<?php

namespace App\Form\Game\Prophecy\Game\Magic;

use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySphere;
use App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecySpellFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('level', IntegerType::class)
            ->add('complexity', IntegerType::class)
            ->add('manaCost', IntegerType::class)
            ->add('castingTime', TextType::class)
            ->add('difficulty', IntegerType::class)
            ->add('description', TextareaType::class)
            ->add('spellKeys', TextType::class)
            ->add('campaign', EntityType::class, [
                'class' => Campaign::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('sphere', EntityType::class, [
                'class' => ProphecySphere::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('discipline', EntityType::class, [
                'class' => ProphecyDiscipline::class,
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
            'data_class' => ProphecySpell::class,
        ]);
    }
}
