<?php

namespace App\Form\Platform\Message;

use App\Entity\Platform\Message\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Required;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\DomCrawler\Field\ChoiceFormField;
use App\Entity\User\User;

class MessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $sender = $options['sender'];
        
        $builder
        ->add('thread', ThreadFormType::class, [
            'label' => false,
            'sender' => $sender,      
        ])
        ->add('message', TextareaType::class)
        ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Platform\Message\Message',
            'sender' => User::class,
        ]);
        $resolver->setRequired(['sender']);
    }
}
 