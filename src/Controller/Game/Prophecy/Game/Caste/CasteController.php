<?php

/*******************************************************************************************************************
 name      : CasteController.php
 Role      : Controller for all caste objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Game\Caste;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste;
use App\Form\Game\Prophecy\Game\Caste\CasteFormType;
use App\Form\Game\Prophecy\Game\Caste\CasteCampaignFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormBenefitType;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormBenefitCampaignType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyStatus;
use App\Form\Game\Prophecy\Game\Caste\ProphecyStatusFormType;
use App\Form\Game\Prophecy\Game\Caste\ProphecyStatusCampaignFormType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormProhibitedType;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormProhibitedCampaignType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormFavourType;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormFavourCampaignType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic;
use App\Form\Game\Prophecy\Game\Caste\ProphecyTechnicFormType;
use App\Form\Game\Prophecy\Game\Caste\ProphecyTechnicCampaignFormType;

class CasteController extends AbstractController
{
	
    /**
     * role: display the form to create a new caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newCaste(Request $request)
    {
        $title = "Nouvelle caste";
        $caste = new ProphecyCaste();
        $campaign = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $route = null;
        $form = $this->createForm(CasteCampaignFormType::class, $caste);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-caste' )
        {
        	$route = 'setup_Prophecy';
        	$form = $this->createForm(CasteFormType::class, $caste);
        	$caste->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
        	$route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($caste);
            $entityManager->flush();
            
            
            return $this->redirectToRoute($route);
            
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(), 
            'title' => $title, 
            'games' => $games,
        ]); 
    }
    
    /**
     * role: display the form to create a new caste status in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newStatus(Request $request)
    {
        $title = "nouveau status de caste";
        $status = new ProphecyStatus();
        
        $campaign = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $route = null;
        $form = $this->createForm(ProphecyStatusCampaignFormType::class, $status);

        if($request->getPathInfo() == '/admin/new-status' )
        {
        	$route = 'setup_Prophecy';
        	$form = $this->createForm(ProphecyStatusFormType::class, $status);
        	$status->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
        	$route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($status);   
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games,
        ]);
    }
    
    /**
     * role: display the form to create a new benefit for a caste in Prophecy Game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newBenefit(Request $request)
    {
        $title = "nouveau bénéfice de caste";
        $benefit = new ProphecyBenefit();
        
        $campaign = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyFormBenefitCampaignType::class, $benefit);
        $route = null;
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-benefit' )
        {
        	$route = 'setup_Prophecy';
        	$form = $this->createForm(ProphecyFormBenefitType::class, $benefit);
        	$benefit->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
        	$route = 'homepage';
        }
              
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($benefit);
            $entityManager->flush();
                      
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games,
        ]);
    }
    
    /**
     * role: display the create a new prohibited item for a caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newProhibited(Request $request, $role, $id)
    {
        $title = "nouvel interdit de caste";
        $prohibited = new ProphecyProhibited();
        
        $campaign = null;
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        if($id == 0)
        {
            $campaign = null;
        }
        
        else 
        {
            $campaign = $campaignRepository->find($id);
        }
        $prohibited->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyFormProhibitedType::class, $prohibited); 
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-prohibited' )
        {
        	$route = 'setup_Prophecy';
        	
        }
        
        //return to campaign owner create content Prophecy if ok 
        else
        {
        	$route = 'campaign';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prohibited);
            $entityManager->flush();
            
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-prohibited')
        {
            return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
                'form' =>$form->createView(),
                'title' => $title,
                'games' => $games,
            ]);
        }
        else
        {
            return $this->render('memberArea/campaign/prophecy/campaign_form_component.html.twig', [
                'form' =>$form->createView(),
                'title' => $title,
                'campaign' => $campaign,
            ]);
        }
    }
   
    /**
     * role: display the for to create a new favour for a caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newFavour(Request $request)
    {
        $title = "nouveau privilège de caste";
        $favour = new prophecyFavour();
        
        $campaign = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $route = null;
        
        $form = $this->createForm(ProphecyFormFavourCampaignType::class, $favour);
      
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-favour' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyFormFavourType::class, $favour);
            $favour->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($favour);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games,
        ]);
    }
    
    /**
     * role: display the form to create a new technic for a caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newTechnic(Request $request)
    {
        $title = "nouvelle technique de caste";
        $technic = new ProphecyTechnic();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $route = null;
        
        $campaign = null;
        
        $form = $this->createForm(ProphecyTechnicCampaignFormType::class, $technic);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-technic' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyTechnicFormType::class, $technic);
            $technic->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if($request->getPathInfo() == '/admin/new-technic')
            {
                $technic->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($technic);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games,
        ]);
    }
}
