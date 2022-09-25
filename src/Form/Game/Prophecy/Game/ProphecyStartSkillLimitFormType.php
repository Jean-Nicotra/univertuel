<?php

namespace App\Form\Game\Prophecy\Game;

use App\Entity\Game\Prophecy\Game\ProphecyStartSkill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecyStartSkillLimitFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('value', IntegerType::class)
            ->add('age', EntityType::class, [
                'class' => ProphecyAge::class,
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
            'data_class' => ProphecyStartSkill::class,
        ]);
    }
}
