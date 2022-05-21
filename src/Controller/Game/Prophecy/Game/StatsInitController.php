<?php

/*******************************************************************************************************************
 name      : StatsInitController.php
 Role      : Controller for figure initialisation objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Game\Prophecy\Game\ProphecyXPIncrease;
use App\Form\Game\Prophecy\Game\ProphecyXPIncreaseFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\ProphecyStartCaracteristic;
use App\Form\Game\Prophecy\Game\ProphecyStartCaracteristicsFormType;

class StatsInitController extends AbstractController
{
    
    /**
     * role: display homepage view to create content for Prophecy game
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function setupProphecy ()
    {
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        return $this->render('memberArea/admin/game/prophecy\prophecy_setup.html.twig', [
            'games' => $games
        ]);
    }
    
    /**
     * role: display the form to setup player's xp progession in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newXPIncrease(Request $request, $role, $id)
    {
        $xpincrease = new ProphecyXPIncrease();
        $title = "paramètres de progression";
        
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
        $xpincrease->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyXPIncreaseFormType::class, $xpincrease);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-xp-increase' )
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
            $entityManager->persist($xpincrease);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-xp-increase')
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
     * role: display the form to setup caracter starting caracteristics in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newStartCaracteristics(Request $request, $role, $id)
    {
        $caracteristics = new ProphecyStartCaracteristic();
        $title = "caractéristiques de départ";
        
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
        $caracteristics->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyStartCaracteristicsFormType::class, $caracteristics);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-start-caracteristics' )
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
            $entityManager->persist($caracteristics);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-start-caracteristics')
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
}
