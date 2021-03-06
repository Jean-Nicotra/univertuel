<?php

namespace App\Form\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Game\Campaign;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProphecyAgeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //Ce formulaire est a revoir, il faut trouver un moyen d'affecter un atribut majeur selon l'age, et ce, en tenant compte qu'on peut créer des attributs majeurs 
        
        $builder
            ->add('name', TextType::class, [
                'label' => 'age',
            ])
            ->add('startAttValue1', IntegerType::class, [
                
            ])
            ->add('startAttValue2', IntegerType::class)
            ->add('startAttValue3', IntegerType::class)
            ->add('startAttValue4', IntegerType::class)
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProphecyAge::class,
        ]);
    }
}
