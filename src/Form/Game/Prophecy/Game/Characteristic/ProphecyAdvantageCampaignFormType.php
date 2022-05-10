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

class ProphecyAdvantageCampaignFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('campaign', EntityType::class, [
                'class' => Campaign::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('advantageCategory', EntityType::class, [
                'class' => ProphecyAdvantageCategory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('multiselect', CheckboxType::class, [
                'required' => false,
            ] )
            ->add('buyable', CheckboxType::class,[ 
                'required' => false,
                ])
            ->add('initialCost', IntegerType::class)
            ->add('description', TextareaType::class)
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
