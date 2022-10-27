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
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyModifierByAge;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendencyAgeNation;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory;
use App\Entity\Game\Prophecy\Game\Item\ProphecyShield;
use App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon;
use App\Entity\Game\Prophecy\Game\Item\ProphecyWeaponCategory;
use App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySphere;
use App\Entity\Game\Prophecy\Game\World\ProphecyNation;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWounds;
use App\Entity\Game\Prophecy\Game\ProphecyStartSkill;


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
        
        //castes
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
        
        //characteristic
        $advantageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage');
        $advantages = $advantageRepository->findBy(['campaign' => null]);
        
        $advantageCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory');
        $advantageCategories = $advantageCategoryRepository->findBy(['campaign' => null]);

        $ageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge');
        $ages = $ageRepository->findBy(['campaign' => null]);
        
        $ageDisadvantageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAgeDisadvantage');
        $ageDisadvantages = $ageDisadvantageRepository->findBy(['campaign' => null]);
        
        $caracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic');
        $caracteristics = $caracteristicRepository->findBy(['campaign' => null]);
        
        $disadvantageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage');
        $disadvantages = $disadvantageRepository->findBy(['campaign' => null]);
        
        $majorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute');
        $majorAttributes = $majorAttributeRepository->findBy(['campaign' => null]);
        
        $minorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute');
        $minorAttributes = $minorAttributeRepository->findBy(['campaign' => null]);
        
        $modifierByAgeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyModifierByAge');
        $modifiersByAge = $modifierByAgeRepository->findBy(['campaign' => null]);
        
        $omenRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen');
        $omens = $omenRepository->findBy(['campaign' => null]);
        
        $skillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill');
        $skills = $skillRepository->findBy(['campaign' => null]);
        
        $skillCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $skillCategories = $skillCategoryRepository->findBy(['campaign' => null]);
        
        $tendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency');
        $tendencies = $tendencyRepository->findBy(['campaign' => null]);
        
        $tendencyAgeNationRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendencyAgeNation');
        $tendenciesAgeNation = $tendencyAgeNationRepository->findBy(['campaign' => null]);
        
        $woundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound');
        $wounds = $woundRepository->findBy(['campaign' => null]);
        
        $woundsFigureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWounds');
        $woundsFigure = $woundsFigureRepository->findBy(['campaign' => null]);
        
        //item
        $armorRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyArmor');
        $armors = $armorRepository->findBy(['campaign' => null]);
        
        $armorCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory');
        $armorCategories = $armorCategoryRepository->findBy(['campaign' => null]);
        
        $shieldRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyShield');
        $shields = $shieldRepository->findBy(['campaign' => null]);
        
        $weaponRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon');
        $weapons = $weaponRepository->findBy(['campaign' => null]);
        
        $weaponCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyWeaponCategory');
        $weaponCategories = $weaponCategoryRepository->findBy(['campaign' => null]);
        
        //magic
        $disciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline');
        $disciplines = $weaponCategoryRepository->findBy(['campaign' => null]);
        
        $spellRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySpell');
        $spells = $spellRepository->findBy(['campaign' => null]);
        
        $sphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $spheres = $spellRepository->findBy(['campaign' => null]);
        
        //world
        $nationRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\World\ProphecyNation');
        $nations = $nationRepository->findBy(['campaign' => null]);
        
        //limit startskills
        $startSkills = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\ProphecyStartSkill');
        $limits = $startSkills->findBy(['campaign' => null]);
        
        
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
            
            foreach ($carriers as $carrier)
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
                $caste = $prohibited->getCaste();
                $newCaste = $casteRepository->findOneBy(['campaign' => $campaign, 'name' => $caste->getName()]);
                $newProhibited->setCampaign($campaign);
                $newProhibited->setCaste($newCaste);
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
            
            foreach ($caracteristics as $caracteristic)
            {
                $newCaracteristic = new ProphecyCaracteristic();
                $newCaracteristic = clone $caracteristic;
                $newCaracteristic->setCampaign($campaign);
                $entityManager->persist($newCaracteristic);
                $entityManager->flush();
            }
            
            foreach ($disadvantages as $disadvantage)
            {
                $newDisadvantage = new ProphecyDisadvantage();
                $newDisadvantage = clone $disadvantage;
                $newDisadvantage->setCampaign($campaign);
                $entityManager->persist($newDisadvantage);
                $entityManager->flush();
            }
            
            foreach ($majorAttributes as $majorAttribute)
            {
                $newMajorAttribute = new ProphecyMajorAttribute();
                $newMajorAttribute = clone $majorAttribute;
                $newMajorAttribute->setCampaign($campaign);
                $entityManager->persist($newMajorAttribute);
                $entityManager->flush();
            }
            
            foreach ($minorAttributes as $minorAttribute)
            {
                $newMinorAttribute = new ProphecyMinorAttribute();
                $newMinorAttribute = clone $minorAttribute;
                $newMinorAttribute->setCampaign($campaign);
                $entityManager->persist($newMinorAttribute);
                $entityManager->flush();
            }
            
            foreach ($minorAttributes as $minorAttribute)
            {
                $newMinorAttribute = new ProphecyMinorAttribute();
                $newMinorAttribute = clone $minorAttribute;
                $newMinorAttribute->setCampaign($campaign);
                $entityManager->persist($newMinorAttribute);
                $entityManager->flush();
            }
            
            foreach ($modifiersByAge as $modifier)
            {
                $newModifier = new ProphecyModifierByAge();
                $newModifier = clone $modifier;
                $newModifier->setCampaign($campaign);
                $entityManager->persist($newModifier);
                $entityManager->flush();
            }
            
            foreach ($omens as $omen)
            {
                $newOmen = new ProphecyOmen();
                $newOmen = clone $omen;
                $newOmen->setCampaign($campaign);
                $entityManager->persist($newOmen);
                $entityManager->flush();
            }
            
            foreach ($skills as $skill)
            {
                $newSkill = new ProphecySkill();
                $newSkill = clone $skill;
                $newSkill->setCampaign($campaign);
                $entityManager->persist($newSkill);
                $entityManager->flush();
            }
            
            foreach ($skillCategories as $category)
            {
                $newSkillCategory = new ProphecySkillCategory();
                $newSkillCategory = clone $category;
                $newSkillCategory->setCampaign($campaign);
                $entityManager->persist($newSkillCategory);
                $entityManager->flush();
            }
            
            foreach ($tendencies as $tendency)
            {
                $newTendency = new ProphecyTendency();
                $newTendency = clone $tendency;
                $newTendency->setCampaign($campaign);
                $entityManager->persist($newTendency);
                $entityManager->flush();
            }
            
            foreach ($tendenciesAgeNation as $tendencyAgeNation)
            {
                $newTendencyAgeNation = new ProphecyTendencyAgeNation();
                $newTendencyAgeNation = clone $tendencyAgeNation;
                $newTendencyAgeNation->setCampaign($campaign);
                $entityManager->persist($newTendencyAgeNation);
                $entityManager->flush();
            }
            
            foreach ($wounds as $wound)
            {
                $newWound = new ProphecyWound();
                $newWound = clone $wound;
                $newWound->setCampaign($campaign);
                $entityManager->persist($newWound);
                $entityManager->flush();
            }
            
            foreach ($woundsFigure as $woundFigure)
            {
                $newWoundFigure = new ProphecyWounds();
                $newWoundFigure = clone $woundFigure;
                $newWoundFigure->setCampaign($campaign);
                $entityManager->persist($newWoundFigure);
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
            
            foreach ($armorCategories as $armorCategory)
            {
                $newArmorCategory = new ProphecyArmorCategory();
                $newArmorCategory = clone $armorCategory;
                $newArmorCategory->setCampaign($campaign);
                $entityManager->persist($newArmorCategory);
                $entityManager->flush();
            }
            
            foreach ($shields as $shield)
            {
                $newShield = new ProphecyShield();
                $newShield = clone $shield;
                $newShield->setCampaign($campaign);
                $entityManager->persist($newShield);
                $entityManager->flush();
            }
            
            foreach ($weapons as $weapon)
            {
                $newWeapon = new ProphecyWeapon();
                $newWeapon = clone $weapon;
                $newWeapon->setCampaign($campaign);
                $entityManager->persist($newWeapon);
                $entityManager->flush();
            }
            
            foreach ($weaponCategories as $category)
            {
                $newWeaponCategory = new ProphecyWeaponCategory();
                $newWeaponCategory = clone $category;
                $newWeaponCategory->setCampaign($campaign);
                $entityManager->persist($newWeaponCategory);
                $entityManager->flush();
            }
            
            //magic
            foreach ($disciplines as $discipline)
            {
                $newDiscipline = new ProphecyDiscipline();
                $newDiscipline = clone $discipline;
                $newDiscipline->setCampaign($campaign);
                $entityManager->persist($newDiscipline);
                $entityManager->flush();
            }
            
            foreach ($spells as $spell)
            {
                $newDiscipline = new ProphecyDiscipline();
                $newDiscipline = clone $discipline;
                $newDiscipline->setCampaign($campaign);
                $entityManager->persist($newDiscipline);
                $entityManager->flush();
            }
            
            foreach ($spheres as $sphere)
            {
                $newSphere = new ProphecySphere();
                $newSphere = clone $sphere;
                $newSphere->setCampaign($campaign);
                $entityManager->persist($newSphere);
                $entityManager->flush();
            }
            
            //world
            foreach ($nations as $nation)
            {
                $newNation = new ProphecyNation();
                $newNation = clone $nation;
                $newNation->setCampaign($campaign);
                $entityManager->persist($newNation);
                $entityManager->flush();
            }
            
            //startskills limit
            
            foreach($limits as $limit)
            {
                $newLimit = new ProphecyStartSkill();
                $newLimit = clone $limit;
                $newLimit->setCampaign($campaign);
                $entityManager->persist($newLimit);
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

            $message->setMessage("");
            
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->persist($thread);
            $em->flush();

            if($thread->getId()>0)
            {
                $th = $thread->getId();
            }
            
            //id is used in route to identifie campaign
            $link = $this->generateUrl($route, [
                'id' => $id,
                'thread' => $th,
                //thread to destroy when figure will be created
                
            ]);
            $message->setMessage
            (
                "voici le lien, clique et crée ton personnage : ". "<a href=".$link.">lien<a>"
                );
            
            $em->persist($message);
            $em->persist($thread);
            $em->flush();
            
            return $this->redirectToRoute('campaign', [
                'id' => $id,
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
