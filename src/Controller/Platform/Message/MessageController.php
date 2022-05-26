<?php
namespace App\Controller\Platform\Message;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Platform\Message\Thread;
use App\Entity\User\User;
use App\Entity\Platform\Message\Message;
use App\Form\Platform\Message\MessageFormType;
use App\Form\Platform\Message\MessageAddFormType;
use App\Form\Platform\Message\MessageContactFormType;
use Doctrine\Common\Collections\ArrayCollection;


class MessageController extends AbstractController
{
    /**
     * role: display all member private messages
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function messages()
    {
        $user = $this->getUser();
        $messageRepository = $this->getDoctrine()->getRepository('App\Entity\Platform\Message\Thread');
        $messages = $messageRepository->findByUser ($user);

        return $this->render('memberArea/message/messages.html.twig', [
            'messages' => $messages,
        ]);
    }

    /**
     * role: create a new message
     * 
     * @param Request $request
     * @return Response
     */
    public function newMessage(Request $request): Response
    {
        $thread = new Thread();
 
        //sender = current user
        $sender = $this->getUser(); 
        $relations = $sender->getRelations(); 

        //create a thread first
        $thread->setSender($sender);
        
        //create message in second
        $message = new Message();
        $message->setSender($sender);
        $message->setNumber(1);
        
        //assign thread created in first
        $message->setThread($thread);           
        
        $form = $this->createForm(MessageFormType::class, $message,['relations' => $relations]);
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
        
        return $this->render('memberArea/message/form_message_new.html.twig', [
            'form' => $form->createView(), 
            'relations' => $relations
        ]);    
    }

    /**
     * role: delete a message by id Thread
     * 
     * @param \Thread $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
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
        
        return $this->render('memberArea/message/messages.html.twig', [
            'messages' => $messages,
            
        ]);
    }

    /**
     * role: send a new message in a thread messages
     * 
     * @param \Thread $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
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
        return $this->render('memberArea/message/form_message_response.html.twig', [
            'messages' => $messages, 'form' => $form->createView(),
        ]);
    }
    
    
    
    
    public function contact(Request $request)
    {
        $thread = new Thread();
        $userRepository = $this->getDoctrine()->getRepository('App\Entity\User\User');
        $receiver = $userRepository->findOneBy(['username' => 'phoenix']);
        $sender = $this->getUser();              //sender = current user
        
        //create a thread first
        $thread->setSender($sender);
        $thread->setReceiver($receiver);
        
        //create message in second
        $message = new Message();
        $message->setSender($sender);
        $message->setReceiver($receiver);
        $message->setNumber(1);
        $message->setThread($thread);           //assign thread created in first
        
        $form = $this->createForm(MessageContactFormType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            //assign thread
            $message->setReceiver($thread->getReceiver());
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            
            return $this->redirectToRoute('homepage');
        }
        
        return $this->render('platform/contact/form_contact_new.html.twig', [
            'form' => $form->createView(),   
        ]);    
    }
    

}

