<?php

/*******************************************************************************************************************
 name      : ItelController.php
 Role      : Controller for all items objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Game\Item;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
    public function newWeaponCategory(Request $request)
    {
        $title = "Nouvelle catégorie d'arme";
        $category = new ProphecyWeaponCategory();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyWeaponCategory');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyWeaponCategoryFormType::class, $category);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-weapon-category')
            {
                $category->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
      
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 'games' => $games
        ]);
    }
    
    /**
     * role: display the form to create new armor category type in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newArmorCategory(Request $request)
    {
        $title = "Nouvelle catégorie d'armure";
        $category = new ProphecyArmorCategory();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyArmorCategoryFormType::class, $category);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-armor-category')
            {
                $category->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 'games' => $games
        ]);
    }
    
    /**
     * role: display the form to create new shield in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newShield(Request $request)
    {
        $title = "Nouveau bouclier";
        $shield = new ProphecyShield();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyShield');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyShieldFormType::class, $shield);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-shield')
            {
                $shield->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($shield);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 'games' => $games
        ]);
    }
    
    /**
     * role: display the form to create new armor in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newArmor(Request $request)
    {
        $title = "Nouvelle Armure";
        $armor = new ProphecyArmor();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyArmor');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyArmorFormType::class, $armor);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-armor')
            {
                $armor->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($armor);     
            $entityManager->flush();
     
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 'games' => $games
        ]);
    }
    
    /**
     * role: display the form to create new weapon in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newWeapon(Request $request)
    {
        $title = "Nouvelle Arme";
        $weapon = new ProphecyWeapon();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyWeaponFormType::class, $weapon);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-weapon')
            {
                $weapon->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($weapon);     
            $entityManager->flush();
         
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 'games' => $games
        ]);
    }
}
