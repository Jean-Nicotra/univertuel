<?php

namespace App\Controller\Game\Prophecy\Game\Item;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\Item\ProphecyWeaponCategory;
use App\Form\Game\Prophecy\Game\Item\ProphecyWeaponCategoryFormType;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory;
use App\Form\Game\Prophecy\Game\Item\ProphecyArmorCategoryFormType;
use App\Entity\Game\Prophecy\Game\Item\ProphecyShield;
use App\Form\Game\Prophecy\Game\Item\ProphecyShieldFormType;

class ItemController extends AbstractController
{
    public function newWeaponCategory(Request $request)
    {
        $title = "Nouvelle catégorie d'arme";
        $category = new ProphecyWeaponCategory();
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newArmorCategory(Request $request)
    {
        $title = "Nouvelle catégorie d'armure";
        $category = new ProphecyArmorCategory();
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newShield(Request $request)
    {
        $title = "Nouveau bouclier";
        $shield = new ProphecyShield();
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
}
