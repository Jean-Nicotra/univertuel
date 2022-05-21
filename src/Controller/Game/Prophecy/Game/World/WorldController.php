<?php

/*******************************************************************************************************************
 name      : WorldController.php
 Role      : Controller for all world objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Game\World;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\World\ProphecyCurrency;
use App\Form\Game\Prophecy\Game\World\ProphecyCurrencyFormType;
use App\Entity\Game\Prophecy\Game\World\ProphecyNation;
use App\Form\Game\Prophecy\Game\World\ProphecyNationFormType;

class WorldController extends AbstractController
{
    /**
     * role: display the form to create new currency in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newCurrency(Request $request, $role, $id)
    {
        $title = "Nouvelle monnaie";
        $currency = new ProphecyCurrency();
        
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
        $currency->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyCurrencyFormType::class, $currency);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-currency' )
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
            $entityManager->persist($currency);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-currency')
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
     * role: display the form to create new nation in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newNation(Request $request, $role, $id)
    {
        $title = "Nouvelle nation";
        $nation = new ProphecyNation();
        
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
        $nation->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyNationFormType::class, $nation);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-nation' )
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
            $entityManager->persist($nation);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-nation')
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
