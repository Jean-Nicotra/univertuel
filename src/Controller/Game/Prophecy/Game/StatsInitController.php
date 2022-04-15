<?php

namespace App\Controller\Game\Prophecy\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game\Prophecy\Game\ProphecyXPIncrease;
use App\Form\Game\Prophecy\Game\ProphecyXPIncreaseFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\ProphecyStartCaracteristic;
use App\Form\Game\Prophecy\Game\ProphecyStartCaracteristicsFormType;

class StatsInitController extends AbstractController
{
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
}
