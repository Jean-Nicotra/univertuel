<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use phpDocumentor\Reflection\PseudoTypes\False_;
use App\Entity\Game\Campaign;

class ProphecyAdvantageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'avantage',
            ])
            ->add('advantageCategory', EntityType::class, [
                'label' => 'catégorie d\'avantage',
                'class' => ProphecyAdvantageCategory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('multiselect', CheckboxType::class, [
                'label' => 'multi sélectionnable',
                'required' => false,
                
            ] )
            ->add('buyable', CheckboxType::class,[
                'label' => 'achetable',
                'required' => false,
                ])
            ->add('initialCost', IntegerType::class, [
                'label' => 'coût',
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
            'data_class' => ProphecyAdvantage::class,
        ]);
    }
}
