<?php

namespace App\Form\Platform\Message;

use App\Entity\Platform\Message\Thread;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;
use App\Entity\User\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ThreadFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $relations = $options['relations'];
        $builder
            ->add('purpose', TextType::class, ['label' => 'Objet'])
            /*
            ->add('receiver', EntityType::class, [
            		'class' => 'App\Entity\User\User',
            		'choice_label' => "username",
            		'expanded' => false,
            		'multiple' => false,
                    'label' => 'Destinataire',
                    //'choices' => ['relations' => $options['relations']]
                
            ])
            */
            
        
            ->add('receiver', ChoiceType::class, [
                'label' => 'destinataire',
                'choices' => $relations, 
                
             ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Thread::class,
           'relations' => array(),
        ]);
        $resolver->setRequired(['relations']);

        
    }
}
