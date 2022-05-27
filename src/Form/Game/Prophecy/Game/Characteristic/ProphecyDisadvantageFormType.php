<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Game\Campaign;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecyDisadvantageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'inconvénient',
            ])
            ->add('multiselect', CheckboxType::class, [
                'label' => 'multi achetable',
                'required' => false,
            ])
            ->add('buyable', CheckboxType::class, [
                'label' => 'achetable',
                'required' => false,
            ])
            ->add('initialCost', IntegerType::class, [
                'label' => 'cout',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'description',
            ])
            ->add('advantageCategory', EntityType::class,[
                'label' => 'catégorie d\'inconvénient',
                'class' => ProphecyAdvantageCategory::class,
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
            'data_class' => ProphecyDisadvantage::class,
        ]);
    }
}
