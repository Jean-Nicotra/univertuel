<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProphecySkillCategoryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'catégorie de compétence',
            ])
            ->add('majorAttribute', EntityType::class, [
                'label' => 'attribut majeur',
                'class' => ProphecyMajorAttribute::class,
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
            'data_class' => ProphecySkillCategory::class,
        ]);
    }
}
