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
            ->add('name', TextType::class, [
                'label' => 'sortilège',
            ])
            ->add('level', IntegerType::class, [
                'label' => 'niveau',
            ])
            ->add('complexity', IntegerType::class, [
                'label' => 'complexité',
            ])
            ->add('manaCost', IntegerType::class, [
                'label' => 'coût en points de magie',
            ])
            ->add('castingTime', TextType::class, [
                'label' => 'temps d\'invocation',
            ])
            ->add('difficulty', IntegerType::class, [
                'label' => 'difficulté',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'description',
            ])
            ->add('spellKeys', TextType::class, [
                'label' => 'clefs',
            ])
            ->add('sphere', EntityType::class, [
                'label' => 'sphère de magie',
                'class' => ProphecySphere::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('discipline', EntityType::class, [
                'label' => 'discipline de magie',
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
