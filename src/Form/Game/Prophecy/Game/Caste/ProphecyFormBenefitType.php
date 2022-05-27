<?php

namespace App\Form\Game\Prophecy\Game\Caste;

use App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste;


class ProphecyFormBenefitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'bénéfice'
            ])
            ->add('caste', EntityType::class, [
                'label' => 'caste',
                'class' => ProphecyCaste::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,    
                
            ])
            ->add('description', TextareaType::class, [
                'label' => 'description'
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyBenefit::class,
        ]);
    }
}
