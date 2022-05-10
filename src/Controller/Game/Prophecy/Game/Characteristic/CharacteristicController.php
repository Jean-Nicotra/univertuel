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
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategoryCampaignFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAdvantageFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCampaignFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyCaracteristicFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyCaracteristicCampaignFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAgeFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAgeCampaignFormType; 
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyDisadvantageFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyDisadvantageCampaignFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyOmenFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyOmenCampaignFormType; 
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyMajorAttributeFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyMajorAttributeCampaignFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyMinorAttributeFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyMinorAttributeCampaignFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecySkillCategoryFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecySkillCategoryCampaignFormType; 
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyTendencyFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyTendencyCampaignFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecySkillFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecySkillCampaignFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyWoundFormType;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyWoundCampaignFormType;

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
        
        $route = null;
        
        $campaign = null;
        
        $form = $this->createForm(ProphecyAdvantageCategoryCampaignFormType::class, $category);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-advantage-category' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyAdvantageCategoryFormType::class, $category);
            $category->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        
        $campaign = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
      
        $form = $this->createForm(ProphecyAdvantageCampaignFormType::class, $advantage);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-advantage' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyAdvantageFormType::class, $advantage);
            $advantage->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($advantage);
            $entityManager->flush();
           
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecyCaracteristicCampaignFormType::class, $caracteristic);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-caracteristic' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyCaracteristicFormType::class, $caracteristic);
            $caracteristic->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {                                 
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($caracteristic);
            $entityManager->flush();
          
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        $campaign = null;
               
        $form = $this->createForm(ProphecyAgeCampaignFormType::class, $age);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-age' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyAgeFormType::class, $age);
            $age->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($age);
            $entityManager->flush();
         
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecyDisadvantageCampaignFormType::class, $disadvantage);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-disadvantage' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyDisadvantageFormType::class, $disadvantage);
            $disadvantage->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($disadvantage);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecyOmenCampaignFormType::class, $omen);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-omen' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyOmenFormType::class, $omen);
            $omen->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($omen);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecyMajorAttributeCampaignFormType::class, $majorAttribute);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-major-attribute' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyMajorAttributeFormType::class, $majorAttribute);
            $majorAttribute->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($majorAttribute);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecyMinorAttributeCampaignFormType::class, $minorAttribute);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-minor-attribute' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyMinorAttributeFormType::class, $minorAttribute);
            $minorAttribute->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($minorAttribute);
            $entityManager->flush();

            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecySkillCategoryCampaignFormType::class, $category);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-skill-category' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecySkillCategoryFormType::class, $category);
            $category->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecyTendencyCampaignFormType::class, $tendency);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-tendency' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyTendencyFormType::class, $tendency);
            $tendency->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tendency);
            $entityManager->flush();
 
            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games,
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecySkillCampaignFormType::class, $skill);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-skill' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecySkillFormType::class, $skill);
            $skill->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($skill);
            $entityManager->flush();

            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games,
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
        
        $route = null;
        $campaign = null;
        
        $form = $this->createForm(ProphecyWoundCampaignFormType::class, $wound);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/new-wound' )
        {
            $route = 'setup_Prophecy';
            $form = $this->createForm(ProphecyWoundFormType::class, $wound);
            $wound->setCampaign($campaign);
        }
        
        //return to campaign owner create content Prophecy if ok /// MODIFIER ICI LA ROUTE POUR LA CAMPAGNE
        else
        {
            $route = 'homepage';
        }
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($wound);
            $entityManager->flush();

            //return to create content Prophecy if ok
            return $this->redirectToRoute($route);
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'games' => $games,
        ]);
    }
}
