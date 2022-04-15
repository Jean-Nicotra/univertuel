<?php

namespace App\Controller\Campaign;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\Campaign\CampaignRepository;
use App\Entity\Campaign\Campaign;
use App\Form\Campaign\CampaignFormType;

class CampaignController extends AbstractController
{
    public function campaigns(Request $request)
    {
        $user = $this->getUser();
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
        $campaigns = $campaignRepository->findBy(['owner' => $user]);
        
        return $this->render('memberArea/campaign/campaigns.html.twig', ['campaigns' => $campaigns]);
    }
    
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('member_homepage');
        }
        
        return $this->render('memberArea/campaign/form_campaign.html.twig', ['form' => $form->createView(),]);
    }
    
    public function viewCampaign($id)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
        $campaign = $campaignRepository->find($id);
        
        return $this->render('memberArea/campaign/campaign.html.twig', ['campaign' => $campaign]);
    }
    
    public function findCampaigns(Request $request)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
        $campaigns = $campaignRepository->findAll();
        
        return $this->render('memberArea/campaign/all_campaigns.html.twig', ['campaigns' => $campaigns]);
    }
    
    public function seeOtherCampaign($id)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
        $campaign = $campaignRepository->find($id);
        
        return $this->render('memberArea/campaign/other_campaign.html.twig', ['campaign' => $campaign]);
    }
    
}
