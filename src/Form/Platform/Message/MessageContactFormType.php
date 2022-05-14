<?php

namespace App\Form\Platform\Message;

use App\Entity\Platform\Message\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MessageContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('thread', ThreadContactFormType::class, [
            'label' => false
        ] )
        ->add('message', TextareaType::class, [
            'data' => 'saisissez ici votre message',
            'label' => false,
            'attr' =>[
                'cols' => 100,
                'rows' => 10,
                'maxlength' => 1000,
            ]   
        ])
        ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
