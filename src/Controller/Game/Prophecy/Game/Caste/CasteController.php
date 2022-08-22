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
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormBenefitType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyStatus;
use App\Form\Game\Prophecy\Game\Caste\ProphecyStatusFormType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormProhibitedType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormFavourType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic;
use App\Form\Game\Prophecy\Game\Caste\ProphecyTechnicFormType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyInitialCurrencies;
use App\Form\Game\Prophecy\Game\Caste\ProphecyInitialCurrenciesFormType;


class CasteController extends AbstractController
{
	
    /**
     * role: display the form to create a new caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newCaste(Request $request, $role, $id)
    {
        $title = "Nouvelle caste";
        $caste = new ProphecyCaste();
        
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
        $caste->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(CasteFormType::class, $caste);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-caste' )
        {
            $route = 'setup_prophecy';
            
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
            $entityManager->persist($caste);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-caste')
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
     * role: display the form to create a new benefit for a caste in Prophecy Game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newBenefit(Request $request, $role, $id)
    {
        $title = "nouveau bénéfice de caste";
        $benefit = new ProphecyBenefit();
        
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
        $benefit->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyFormBenefitType::class, $benefit);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-benefit' )
        {
            $route = 'setup_prophecy';
            
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
            $entityManager->persist($benefit);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-benefit')
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
     * role: display the form to create a new caste status in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newStatus(Request $request, $role, $id)
    {
        $title = "nouveau status de caste";
        $status = new ProphecyStatus();
        
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
        $status->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyStatusFormType::class, $status); 
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-status' )
        {
            $route = 'setup_prophecy';
            
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
            $entityManager->persist($status);   
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-status')
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
        	$route = 'setup_prophecy';
        	
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
    public function newFavour(Request $request, $role, $id)
    {
        $title = "nouveau privilège de caste";
        $favour = new prophecyFavour();
        
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
        $favour->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyFormFavourType::class, $favour);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-favour' )
        {
            $route = 'setup_prophecy';
            
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
            $entityManager->persist($favour);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-favour')
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
     * role: display the form to create a new technic for a caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newTechnic(Request $request, $role, $id)
    {
        $title = "nouvelle technique de caste";
        $technic = new ProphecyTechnic();
        
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
        $technic->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyTechnicFormType::class, $technic);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-technic' )
        {
            $route = 'setup_prophecy';
            
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
            $entityManager->persist($technic);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-technic')
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
    
    public function newInitialCurrencies (Request $request, $role, $id)
    {
        $title = "nouvel argent de départ";
        $initialCurrency = new ProphecyInitialCurrencies();
        
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
        $initialCurrency->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyInitialCurrenciesFormType::class, $initialCurrency);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-initial-currencies' )
        {
            $route = 'setup_prophecy';
            
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
            $entityManager->persist($initialCurrency);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-initial-currencies')
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
