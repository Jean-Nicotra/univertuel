<?php

/*******************************************************************************************************************
 name      : ItelController.php
 Role      : Controller for all items objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Game\Item;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\Item\ProphecyWeaponCategory;
use App\Form\Game\Prophecy\Game\Item\ProphecyWeaponCategoryFormType;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory;
use App\Form\Game\Prophecy\Game\Item\ProphecyArmorCategoryFormType;
use App\Entity\Game\Prophecy\Game\Item\ProphecyShield;
use App\Form\Game\Prophecy\Game\Item\ProphecyShieldFormType;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;
use App\Form\Game\Prophecy\Game\Item\ProphecyArmorFormType;
use App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon;
use App\Form\Game\Prophecy\Game\Item\ProphecyWeaponFormType;

class ItemController extends AbstractController
{
    /**
     * role: display the form to create new weapon category type in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newWeaponCategory(Request $request, $role, $id)
    {
        $title = "Nouvelle catégorie d'arme";
        $category = new ProphecyWeaponCategory();
        
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
        $category->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyWeaponCategoryFormType::class, $category);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-weapon-category' )
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
            $entityManager->persist($category);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-weapon-category')
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
     * role: display the form to create new armor category type in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newArmorCategory(Request $request, $role, $id)
    {
        $title = "Nouvelle catégorie d'armure";
        $category = new ProphecyArmorCategory();
        
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
        $category->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyArmorCategoryFormType::class, $category);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-armor-category' )
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
            $entityManager->persist($category);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-armor-category')
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
     * role: display the form to create new shield in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newShield(Request $request, $role, $id)
    {
        $title = "Nouveau bouclier";
        $shield = new ProphecyShield();
        
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
        $shield->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyShieldFormType::class, $shield);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-shield' )
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
            $entityManager->persist($shield);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-shield')
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
     * role: display the form to create new armor in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newArmor(Request $request, $role, $id)
    {
        $title = "Nouvelle Armure";
        $armor = new ProphecyArmor();
        
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
        $armor->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyArmorFormType::class, $armor);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-armor' )
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
            $entityManager->persist($armor);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-armor')
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
     * role: display the form to create new weapon in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newWeapon(Request $request, $role, $id)
    {
        $title = "Nouvelle Arme";
        $weapon = new ProphecyWeapon();
        
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
        $weapon->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyWeaponFormType::class, $weapon);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-weapon' )
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
            $entityManager->persist($weapon);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-weapon')
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
