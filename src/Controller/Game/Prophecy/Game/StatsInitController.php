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
    public function newXPIncrease(Request $request)
    {
        $xpincrease = new ProphecyXPIncrease();
        $title = "paramètres de progression";
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCurrency');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyXPIncreaseFormType::class, $xpincrease);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-xp-increase')
            {
                $xpincrease->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($xpincrease);            
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items,
            'games' => $games
        ]);
    }
    
    /**
     * role: display the form to setup caracter starting caracteristics in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newStartCaracteristics(Request $request)
    {
        $caracteristics = new ProphecyStartCaracteristic();
        $title = "caractéristiques de départ";
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCurrency');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyStartCaracteristicsFormType::class, $caracteristics);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-start-caracteristics')
            {
                $caracteristics->setCampaign(null);
            }
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($caracteristics); 
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 
            'games' => $games
        ]);
    }
}
