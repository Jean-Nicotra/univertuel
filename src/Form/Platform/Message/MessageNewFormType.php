<?php

namespace App\Form\Platform\Message;

use App\Entity\Platform\Message\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageNewFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isSenderReaded')
            ->add('isReceiverReaded')
            ->add('number')
            ->add('date')
            ->add('message')
            ->add('sender')
            ->add('receiver')
            ->add('thread')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
