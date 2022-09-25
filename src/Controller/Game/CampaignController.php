<?php

/*******************************************************************************************************************
 name      : CampaignController.php
 Role      : Controller for all campaign routes
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Campaign;
use App\Form\Game\Campaign\CampaignFormType;
use App\Entity\Platform\Message\Thread;
use App\Entity\User\User;
use App\Entity\Platform\Message\Message;
use App\Form\Game\Campaign\SendCampaignInvitationFormType;


class CampaignController extends AbstractController
{
    
    /**
     * role : display list of all your own campaigns  
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function campaigns()
    {
        $user = $this->getUser();
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaigns = $campaignRepository->findBy(['owner' => $user]);
        
        return $this->render('memberArea/campaign/campaigns.html.twig', ['campaigns' => $campaigns]);
    }
    
    /**
     * role : form to create a new campaign
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newCampaign(Request $request)
    {
        $user = $this->getUser();
        $campaign = new Campaign();
        $campaign->setOwner($user);
        
        $form = $this->createForm(CampaignFormType::class, $campaign);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($campaign);
            $entityManager->flush();
            
            return $this->redirectToRoute('member_homepage');
        }
        
        return $this->render('memberArea/campaign/form_campaign.html.twig', ['form' => $form->createView(),]);
    }
    
    /**
     * role : display content of your own campaign
     * 
     * @param Campaign $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewCampaign($id)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($id);
        
        return $this->render('memberArea/campaign/campaign.html.twig', ['campaign' => $campaign]);
    }
    
    /**
     * role : display a list of all available campaigns
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findCampaigns()
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaigns = $campaignRepository->findAll();
        
        return $this->render('memberArea/campaign/all_campaigns.html.twig', ['campaigns' => $campaigns]);
    }
    
    /**
     * role : display description of a campaign, access to the asking invitation to join campaign
     * 
     * @param Campaign $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function seeOtherCampaign($id)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($id);
        
        return $this->render('memberArea/campaign/other_campaign.html.twig', ['campaign' => $campaign]);
    }
    
    /**
     * role: send a message to a campaign user onwer for asking to join in
     *
     * @param Request $request
     * @param Campaign $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function askCampaignInvitation(Request $request, $id)
    {
        $thread = new Thread();
        $receiver = new User();
        $sender = $this->getUser();              //sender = current user
        
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
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
    
    
    /**
     * role: send a message to someone by a campaign owner user. It generate a link to create a figure
     *
     * @param Request $request
     * @param Campaign $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function sendCampaignInvitation(Request $request, $id)
    {
        $thread = new Thread();
        $sender = $this->getUser();              //sender = current user
        $thread->setPurpose ('participation à la campagne');
        $thread->setSender($sender);
        
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = new Campaign();
        $campaign = $campaignRepository->find($id);
        
        $game = $campaign->getGame();
        $route = $game->getInterfaceCode().'_new_figure';
        
        //create message in second
        $message = new Message();
        $message->setSender($sender);
        $message->setNumber(1);
        $message->setThread($thread);           //assign thread created in first
        
        $form = $this->createForm(SendCampaignInvitationFormType::class, $message, [
            'sender' => $sender,     
        ]);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $message->setReceiver($thread->getReceiver());
            
            //id is used in route to identifie campaign
            $link = $this->generateUrl($route, [
                'id' => $id
            ]);
            
            $message->setMessage
            (
                "voici le lien, clique et crée ton personnage : ". "<a href=".$link.">lien<a>"
            );
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->persist($thread);
            $em->flush();
            
            return $this->redirectToRoute('campaign', [
                'id' => $id
            ]);
        }
        return $this->render('memberArea/campaign/form_send_campaign_invitation.html.twig',[
            'campaign' => $campaign, 
            'form' => $form->createView() 
        ]);
    }
    
    public function findAddComponent ($id)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($id);
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $game = $gameRepository->find($campaign->getGame()->getId());
        
        return $this->render('memberArea/campaign/'.$game->getInterfaceCode().'/campaign_add_component.html.twig', [
            'campaign' => $campaign,
        ]);
    }
    
    public function findFigures ($id)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($id);
        
        $figuresRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Figure');
        $figures = $figuresRepository->findBy(['campaign' => $campaign]);
        
        return $this->render('memberArea/campaign/campaign_figures.html.twig', [
            'campaign' => $campaign, 
            'msg' => 'section faite pour la liste des personnages de la campagne',
            'figures' => $figures
            
        ]);
    }
    
}
