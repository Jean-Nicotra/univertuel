<?php

/*******************************************************************************************************************
 name      : StatsInitController.php
 Role      : Controller for figure initialisation objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Game\Prophecy\Game\ProphecyXPIncrease;
use App\Form\Game\Prophecy\Game\ProphecyXPIncreaseFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\ProphecyStartCaracteristic;
use App\Form\Game\Prophecy\Game\ProphecyStartCaracteristicsFormType;

class StatsInitController extends AbstractController
{
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
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
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
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
}
