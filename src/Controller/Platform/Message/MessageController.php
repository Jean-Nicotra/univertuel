<?php
namespace App\Controller\Platform\Message;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Platform\Message\Thread;
use App\Entity\User\User;
use App\Entity\Platform\Message\Message;
use App\Form\Message\MessageFormType;
use App\Form\Message\MessageAddFormType;
use App\Entity\Campaign\Campaign;
use App\Form\Platform\Message\SendCampaignInvitationFormType;



class MessageController extends AbstractController
{

    public function messages()
    {
        $user = $this->getUser();
        $messageRepository = $this->getDoctrine()->getRepository('App\Entity\Platform\Message\Thread');
        $messages = $messageRepository->findByUser ($user);

        return $this->render('memberArea/message/messages.html.twig', ['messages' => $messages]);
    }
    
    public function newMessage(Request $request): Response
    {
        $thread = new Thread();
        $receiver = new User();
        
        $sender = $this->getUser();              //sender = current user
        
        //create a thread first
        $thread->setSender($sender);
        
        //create message in second
        $message = new Message();
        $message->setSender($sender);
        $message->setNumber(1);
        $message->setThread($thread);           //assign thread created in first
        
        $form = $this->createForm(MessageFormType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            //assign thread
            $message->setReceiver($thread->getReceiver());
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            
            return $this->redirectToRoute('messages');
        }
        
        return $this->render('memberArea/message/form_message_new.html.twig', ['form' => $form->createView()]);    
    }
    
    public function deleteMessage ($id)
    {
        $threadRepository = $this->getDoctrine()->getRepository('App\Entity\Platform\Message\Thread');
        $thread = $threadRepository->find($id);
        $user = $this->getUser();
        if($thread->getSender() == $user)
        {
            $thread->setIsSenderDeleted(true);
        }
        else
        {
            $thread->setIsReceiverDeleted(true);
        }
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        
        $messages = $threadRepository->findByUser ($user);
        
        return $this->render('memberArea/message/messages.html.twig', ['messages' => $messages]);
    }
    
    public function messageResponse($id, Request $request)
    {
        $threadRepository = $this->getDoctrine()->getRepository('App\Entity\Platform\Message\Thread');
        $messageRepository = $this->getDoctrine()->getRepository('App\Entity\Platform\Message\Message');
        $thread = $threadRepository->find($id);
        $messages = $messageRepository->findByThread($thread);
        $number = 0;
        foreach ($messages as $instance)
        {
            $number++;
        }
        $sender = $this->getUser();
        $receiver = new User();
        if($thread->getSender() == $sender)
        {
            $receiver = $thread->getReceiver();
        }
        else
        {
            $receiver = $thread->getSender();
        }
        
        $message = new Message();
        $message->setThread($thread);
        $message->setSender($sender);
        $message->setReceiver($receiver);
        $message->setNumber($number+1);
        $form = $this->createForm(MessageAddFormType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->persist($thread);
            $em->flush();
            
            return $this->redirectToRoute('messages');
        }
        return $this->render('memberArea/message/form_message_response.html.twig', ['messages' => $messages, 'form' => $form->createView()]);
    }
    
    public function askCampaignInvitation(Request $request, $id)
    {
        $thread = new Thread();
        $receiver = new User();
        $sender = $this->getUser();              //sender = current user
        
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
        $campaign = new Campaign();
        $campaign = $campaignRepository->find($id);
        $receiver = $campaign->getOwner();
        
        //create a thread first
        $thread->setSender($sender);
        $thread->setReceiver($receiver);
        $thread->setPurpose("demande d'invitation à participer à la campagne : ".$campaign->getName(). 
        " se déroulant dans l'univers de ".$campaign->getGame()->getName() );
        
        //create message in second
        $message = new Message();
        $message->setSender($sender);
        $message->setNumber(1);
        $message->setThread($thread);           //assign thread created in first
        $message->setMessage('Bonjour, je sollicite une invitation à participer à la campagne : '.$campaign->getName(). 
        ' se déroulant dans l\'univers de '.$campaign->getGame()->getName() );
        $message->setReceiver($thread->getReceiver());
        
        //assign thread

        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
        $em->flush();         
        
        return $this->redirectToRoute('member_homepage');
    }
    

    
    public function sendCampaignInvitation(Request $request, $id)
    {
        $thread = new Thread();
        $receiver = new User();
        $sender = $this->getUser();              //sender = current user
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
        $campaign = new Campaign();
        $campaign = $campaignRepository->find($id);
        $campaigns = $campaignRepository->findBy(['owner' => $this->getUser()]);
        $thread->setPurpose ('participation à la campagne');
        $thread->setSender($sender);
        
        //create message in second
        $message = new Message();
        $message->setSender($sender);
        $message->setNumber(1);
        $message->setThread($thread);           //assign thread created in first
        
        $form = $this->createForm(SendCampaignInvitationFormType::class, $message);  
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $message->setReceiver($thread->getReceiver());
            //$link = $this->generateUrl('new_figure', ['id' => $id, 'user'=> $thread->getReceiver()->getId()]);
            $link = $this->generateUrl('new_figure', ['id' => $id]);
            $message->setMessage
            (
                "voici le lien, clique et crée ton personnage : ". "<a href=".$link.">lien<a>"
                );
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->persist($thread);
            $em->flush();
            
            return $this->redirectToRoute('campaign', ['id' => $id]);
        }
        return $this->render('memberArea/campaign/form_send_campaign_invitation.html.twig', 
            ['campaign' => $campaign, 'form' => $form->createView() ]);
    }
    
}

