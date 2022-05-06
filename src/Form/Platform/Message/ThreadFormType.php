<?php

namespace App\Form\Platform\Message;

use App\Entity\Platform\Message\Thread;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ThreadFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('purpose', TextType::class, ['label' => 'Objet'])
            ->add('receiver', EntityType::class, [
            		'class' => 'App\Entity\User\User',
            		'choice_label' => "username",
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'Destinataire'
                    
            		
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Thread::class,
        ]);
        
    }
}
