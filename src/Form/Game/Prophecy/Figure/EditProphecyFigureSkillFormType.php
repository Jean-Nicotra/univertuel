<?php

namespace App\Form\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Webmozart\Assert\Assert;
use Symfony\Component\Validator\Constraints\LessThan;

class EditProphecyFigureSkillFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $limit = $options['limit'];
        
        $builder
        ->add('skill', TextType::class, [
            'label' => false, 
            'disabled' => true,
            
        ])
        ->add('value', IntegerType::class, [
            'label' => false,
            'attr' => [
                'class' => 'inputSkill',
                'lastvalue' => 0,
                'maxValue' => $limit,
                ],
        ])
        ;
            
    

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyFigureSkill::class,
        ]);
        
        $resolver->setRequired('limit');
    }
}
