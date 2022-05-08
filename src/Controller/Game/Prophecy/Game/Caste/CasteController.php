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
use App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormFavourType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic;
use App\Form\Game\Prophecy\Game\Caste\ProphecyTechnicFormType;

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
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste');
        $items = $itemRepository->findBy(['campaign' => $campaign]);
        
        $route = null;
        $form = $this->createForm(CasteCampaignFormType::class, $caste);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-caste' )
        {
        	$route = 'setup_Prophecy';
        	$form = $this->createForm(CasteFormType::class, $caste);
        	$caste->setCampaign(null);
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
            'items' => $items, 'games' => $games
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
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyStatus');
        $items = $itemRepository->findAll();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $route = null;
        $form = $this->createForm(ProphecyStatusCampaignFormType::class, $status);

        if($request->getPathInfo() == '/admin/new-status' )
        {
        	$route = 'setup_Prophecy';
        	$form = $this->createForm(ProphecyStatusFormType::class, $status);
        	$status->setCampaign(null);
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
            'items' => $items, 'games' => $games
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
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit');
        $items = $itemRepository->findAll();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyFormBenefitCampaignType::class, $benefit);
        $route = null;
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-benefit' )
        {
        	$route = 'setup_Prophecy';
        	$form = $this->createForm(ProphecyFormBenefitType::class, $benefit);
        	$benefit->setCampaign(null);
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
            'items' => $items, 'games' => $games
        ]);
    }
    
    /**
     * role: display the create a new prohibited item for a caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newProhibited(Request $request)
    {
        $title = "nouvel interdit de caste";
        $prohibited = new ProphecyProhibited();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited');
        $items = $itemRepository->findAll();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyFormProhibitedType::class, $prohibited); 
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-prohibited' )
        {
        	$route = 'setup_Prophecy';
        	$form = $form = $this->createForm(ProphecyFormProhibitedType::class, $prohibited); 
        	$prohibited->setCampaign(null);
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
            $entityManager->persist($prohibited);
            $entityManager->flush();
            
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 'games' => $games
        ]);
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
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour');
        $items = $itemRepository->findAll();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyFormFavourType::class, $favour);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($favour);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_Prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 'games' => $games
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
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic');
        $items = $itemRepository->findAll();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyTechnicFormType::class, $technic);
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
            return $this->redirectToRoute('setup_Prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 'games' => $games
        ]);
    }
}
