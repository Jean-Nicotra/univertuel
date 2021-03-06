<?php

namespace App\Form\Game\Campaign;

use App\Entity\Platform\Message\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Form\Platform\Message\ThreadFormType;
use App\Entity\User\User;



class SendCampaignInvitationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $sender = $options['sender'];
        
        $builder
        ->add('thread', ThreadFormType::class, [
            'label' => false,
            'sender' => $sender,
        ])
        ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
            'sender' => User::class,
        ]);
        $resolver->setRequired(['sender']);
    }
}
