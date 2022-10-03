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
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyCarrier;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyInitialCurrencies;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyStatus;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAgeDisadvantage;


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
        
        $benefitRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit');
        $benefits = $benefitRepository->findBy(['campaign' => null]);
        
        $carrierRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyCarrier');
        $carriers = $carrierRepository->findBy(['campaign' => null]);
        
        $casteRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste');
        $castes = $casteRepository->findBy(['campaign' => null]);
        
        $favourRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour');
        $favours = $favourRepository->findBy(['campaign' => null]);
        
        $initialCurrenciesRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyInitialCurrencies');
        $initialCurrencies = $initialCurrenciesRepository->findBy(['campaign' => null]);
        
        $prophibitedRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited');
        $prohibiteds = $prophibitedRepository->findBy(['campaign' => null]);
        
        $statusRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyStatus');
        $statusList = $statusRepository->findBy(['campaign' => null]);
        
        $technicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic');
        $technics = $technicRepository->findBy(['campaign' => null]);
        
        $advantageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage');
        $advantages = $advantageRepository->findBy(['campaign' => null]);
        
        $advantageCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory');
        $advantageCategories = $advantageCategoryRepository->findBy(['campaign' => null]);

        $ageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge');
        $ages = $ageRepository->findBy(['campaign' => null]);
        
        $ageDisadvantageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAgeDisadvantage');
        $ageDisadvantages = $ageDisadvantageRepository->findBy(['campaign' => null]);
        
        $armorRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyArmor');
        $armors = $armorRepository->findBy(['campaign' => null]);
        
        
        
        $form = $this->createForm(CampaignFormType::class, $campaign);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($campaign);
            $entityManager->flush();
            
            //caste
            foreach ($benefits as $benefit)
            {
                $newBenefit = new ProphecyBenefit();
                $newBenefit = clone $benefit;
                $newBenefit->setCampaign($campaign);
                $entityManager->persist($newBenefit);
                $entityManager->flush();
            }
            
            foreach ($Carriers as $carrier)
            {
                $newCarrier = new ProphecyCarrier();
                $newCarrier = clone $carrier;
                $newCarrier->setCampaign($campaign);
                $entityManager->persist($newCarrier);
                $entityManager->flush();
            }
            
            foreach ($castes as $caste)
            {
                $newCaste = new ProphecyCaste();
                $newCaste = clone $caste;
                $newCaste->setCampaign($campaign);
                $entityManager->persist($newCaste);
                $entityManager->flush();
            }
            
            foreach ($favours as $favour)
            {
                $newFavour = new ProphecyFavour();
                $newFavour = clone $favour;
                $newFavour->setCampaign($campaign);
                $entityManager->persist($newFavour);
                $entityManager->flush();
            }
            
            foreach ($initialCurrencies as $initialCurrency)
            {
                $newInitialCurrency = new ProphecyInitialCurrencies();
                $newInitialCurrency = clone $initialCurrency;
                $newInitialCurrency->setCampaign($campaign);
                $entityManager->persist($newInitialCurrency);
                $entityManager->flush();
            }
            
            foreach ($prohibiteds as $prohibited)
            {
                $newProhibited = new ProphecyProhibited();
                $newProhibited = clone $prohibited;
                $newProhibited->setCampaign($campaign);
                $entityManager->persist($newProhibited);
                $entityManager->flush();
            }
            
            foreach ($statusList as $status)
            {
                $newStatus = new ProphecyStatus();
                $newStatus = clone $status;
                $newStatus->setCampaign($campaign);
                $entityManager->persist($newStatus);
                $entityManager->flush();
            }
            
            foreach ($technics as $technic)
            {
                $newTechnic = new ProphecyTechnic();
                $newTechnic = clone $technic;
                $newTechnic->setCampaign($campaign);
                $entityManager->persist($newTechnic);
                $entityManager->flush();
            }
            
            //characteristic
            foreach ($advantages as $advantage)
            {
                $newAdvantage = new ProphecyAdvantage();
                $newAdvantage = clone $advantage;
                $newAdvantage->setCampaign($campaign);
                $entityManager->persist($newAdvantage);
                $entityManager->flush();
            }
            
            foreach ($advantageCategories as $advantageCategory)
            {
                $newAdvantageCategory = new ProphecyAdvantageCategory();
                $newAdvantageCategory = clone $advantageCategory;
                $newAdvantageCategory->setCampaign($campaign);
                $entityManager->persist($newAdvantageCategory);
                $entityManager->flush();
            }
            
            foreach ($ages as $age)
            {
                $newAge = new ProphecyAge();
                $newAge = clone $age;
                $newAge->setCampaign($campaign);
                $entityManager->persist($newAge);
                $entityManager->flush();
            }
            
            foreach ($ageDisadvantages as $ageDisadvantage)
            {
                $newAgeDisadvantage = new ProphecyAgeDisadvantage();
                $newAgeDisadvantage = clone $ageDisadvantage;
                $newAgeDisadvantage->setCampaign($campaign);
                $entityManager->persist($newAgeDisadvantage);
                $entityManager->flush();
            }
            
            //item
            foreach ($armors as $armor)
            {
                $newArmor = new ProphecyArmor();
                $newArmor = clone $armor;
                $newArmor->setCampaign($campaign);
                $entityManager->persist($newArmor);
                $entityManager->flush();
            }
            
            
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
