<?php

namespace App\Form\Game\Prophecy\Game\Caste;

use App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste;
use App\Entity\Game\Prophecy\Game\Caste\prophecyFavour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Game\Campaign;

class ProphecyFormFavourCampaignType extends AbstractType
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
            ->add('caste', EntityType::class, [
                'class' => ProphecyCaste::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                
            ])
            ->add('description', TextareaType::class)
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => prophecyFavour::class,
        ]);
    }
}
