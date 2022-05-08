<?php

/*******************************************************************************************************************
 name      : CharacteristicController.php
 Role      : Controller for all caracteristic objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/
/*    A MODIFIER          */
namespace App\Controller\Game\Prophecy\Game\Characteristic;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategoryFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAdvantageFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyCaracteristicFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAgeFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyDisadvantageFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyOmenFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyMajorAttributeFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyMinorAttributeFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecySkillCategoryFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyTendencyFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecySkillFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyWoundFormType;

class CharacteristicController extends AbstractController
{
    /**
     * role: display the for to create new advantage category in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */   
    public function newAdvantageCategory(Request $request)
    {
        $title = "Nouvelle catégorie d'avantage et inconvénient";
        $category = new ProphecyAdvantageCategory();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyAdvantageCategoryFormType::class, $category);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
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
     * role: display the form to create new advantage in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAdvantage(Request $request)
    {
        $title = "Nouvel avantage";
        $advantage = new ProphecyAdvantage();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage');
        $items = $itemRepository->findAll();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyAdvantageFormType::class, $advantage);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($advantage);
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
     * display the form to create new caracteristic in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newCaracteristic(Request $request)
    {
        $title = "Nouvelle caractéristique";
        $caracteristic = new ProphecyCaracteristic();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyCaracteristicFormType::class, $caracteristic);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {                                 
            if ($request->getPathInfo() == '/admin/new-caracteristic')
            {
                $caracteristic->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($caracteristic);
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
     * role: display the form to create new age in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAge(Request $request)
    {
        $title = "Nouvel âge";
        $age = new ProphecyAge();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyAgeFormType::class, $age);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-age')
            {
                $age->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($age);
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
     * role: display the form to create new disadvantage in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newDisadvantage(Request $request)
    {
        $title = "Nouvel inconvénient";
        $disadvantage = new ProphecyDisadvantage();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyDisadvantageFormType::class, $disadvantage);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-disadvantage')
            {
                $disadvantage->setCampaign(null);
            }
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($disadvantage);
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
     * display the form to create new omen in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newOmen(Request $request)
    {
        $title = "Nouvel augure";
        $omen = new ProphecyOmen();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyOmenFormType::class, $omen);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($omen);
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
     * role: display the form to create new major attribute in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */    
    public function newMajorAttribute(Request $request)
    {
        $title = "Nouvel attribut majeur";
        $majorAttribute = new ProphecyMajorAttribute();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyMajorAttributeFormType::class, $majorAttribute);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-major-attribute')
            {
                $majorAttribute->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($majorAttribute);
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
     * role: display the form to create new minor attribute in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newMinorAttribute(Request $request)
    {
        $title = "Nouvel attribut mineur";
        $minorAttribute = new ProphecyMinorAttribute();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyMinorAttributeFormType::class, $minorAttribute);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-minor-attribute')
            {
                $minorAttribute->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($minorAttribute);
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
     * role: display the form to create new skill category in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newSkillCategory(Request $request)
    {
        $title = "Nouvelle catégorie de compétence";
        $category = new ProphecySkillCategory();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecySkillCategoryFormType::class, $category);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
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
     * role: display the form to create new tendency in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newTendency(Request $request)
    {
        $title = "Nouvelle tendence";
        $tendency = new ProphecyTendency();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyTendencyFormType::class, $tendency);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-tendency')return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
            {
                $tendency->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tendency);
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
     * role: display the form to create new skill in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newSkill(Request $request)
    {
        $title = "Nouvelle compétence";
        $skill = new ProphecySkill();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecySkillFormType::class, $skill);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-skill')
            {
                $skill->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($skill);
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
     * role: display the form to create new wound type in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newWound(Request $request)
    {
        $title = "Nouveau type de blessure";
        $wound = new ProphecyWound();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyWoundFormType::class, $wound);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-wound')
            {
                $wound->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($wound);
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
