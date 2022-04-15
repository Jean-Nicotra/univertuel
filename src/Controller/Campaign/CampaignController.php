<?php

/*******************************************************************************************************************
 name      : CampaignController.php
 Role      : Controller for all campaign routes
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Campaign;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Campaign\Campaign;
use App\Form\Campaign\CampaignFormType;

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
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
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
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
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
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
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
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
        $campaign = $campaignRepository->find($id);
        
        return $this->render('memberArea/campaign/other_campaign.html.twig', ['campaign' => $campaign]);
    }
    
}
