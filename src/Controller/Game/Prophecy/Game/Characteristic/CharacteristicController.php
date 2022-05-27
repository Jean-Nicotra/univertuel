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
    public function newAdvantageCategory(Request $request, $role, $id)
    {
        $title = "Nouvelle catégorie d'avantage et inconvénient";
        $category = new ProphecyAdvantageCategory();
        
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
        
        $form = $this->createForm(ProphecyAdvantageCategoryFormType::class, $category);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-advantage-category' )
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
            $entityManager->persist($category);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-advantage-category')
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
     * role: display the form to create new advantage in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAdvantage(Request $request, $role, $id)
    {
        $title = "Nouvel avantage";
        $advantage = new ProphecyAdvantage();
        
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
        $advantage->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyAdvantageFormType::class, $advantage);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-advantage' )
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
            $entityManager->persist($advantage);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-advantage')
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
     * display the form to create new caracteristic in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newCaracteristic(Request $request, $role, $id)
    {
        $title = "Nouvelle caractéristique";
        $caracteristic = new ProphecyCaracteristic();
        
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
        $caracteristic->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyCaracteristicFormType::class, $caracteristic);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-caracteristic' )
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
            $entityManager->persist($caracteristic);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-caracteristic')
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
     * role: display the form to create new age in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAge(Request $request, $role, $id)
    {
        $title = "Nouvel âge";
        $age = new ProphecyAge();
        
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
        $age->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyAgeFormType::class, $age);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-age' )
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
            $entityManager->persist($age);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-age')
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
     * role: display the form to create new disadvantage in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newDisadvantage(Request $request, $role, $id)
    {
        $title = "Nouvel inconvénient";
        $disadvantage = new ProphecyDisadvantage();
        
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
        $disadvantage->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyDisadvantageFormType::class, $disadvantage);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-disadvantage' )
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
            $entityManager->persist($disadvantage);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-disadvantage')
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
     * display the form to create new omen in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newOmen(Request $request, $role, $id)
    {
        $title = "Nouvel augure";
        $omen = new ProphecyOmen();
        
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
        $omen->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyOmenFormType::class, $omen);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-omen' )
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
            $entityManager->persist($omen);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-omen')
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
     * role: display the form to create new major attribute in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */    
    public function newMajorAttribute(Request $request, $role, $id)
    {
        $title = "Nouvel attribut majeur";
        $majorAttribute = new ProphecyMajorAttribute();
        
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
        $majorAttribute->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyMajorAttributeFormType::class, $majorAttribute);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-major-attribute' )
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
            $entityManager->persist($majorAttribute);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-major-attribute')
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
     * role: display the form to create new minor attribute in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newMinorAttribute(Request $request, $role, $id)
    {
        $title = "Nouvel attribut mineur";
        $minorAttribute = new ProphecyMinorAttribute();
        
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
        $minorAttribute->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyMinorAttributeFormType::class, $minorAttribute);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-minor-attribute' )
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
            $entityManager->persist($minorAttribute);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-minor-attribute')
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
     * role: display the form to create new skill category in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newSkillCategory(Request $request, $role, $id)
    {
        $title = "Nouvelle catégorie de compétence";
        $category = new ProphecySkillCategory();
        
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
        
        $form = $this->createForm(ProphecySkillCategoryFormType::class, $category);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-skill-category' )
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
            $entityManager->persist($category);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-skill-category')
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
     * role: display the form to create new tendency in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newTendency(Request $request, $role, $id)
    {
        $title = "Nouvelle tendence";
        $tendency = new ProphecyTendency();
        
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
        $tendency->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyTendencyFormType::class, $tendency);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-tendency' )
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
            $entityManager->persist($tendency);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-tendency')
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
     * role: display the form to create new skill in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newSkill(Request $request, $role, $id)
    {
        $title = "Nouvelle compétence";
        $skill = new ProphecySkill();
        
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
        $skill->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecySkillFormType::class, $skill);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-skill' )
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
            $entityManager->persist($skill);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-skill')
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
     * role: display the form to create new wound type in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newWound(Request $request, $role, $id)
    {
        $title = "Nouveau type de blessure";
        $wound = new ProphecyWound();
        
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
        $wound->setCampaign($campaign);
        $route = null;
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $form = $this->createForm(ProphecyWoundFormType::class, $wound);
        
        //return to admin create content Prophecy if ok
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-wound' )
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
            $entityManager->persist($wound);
            $entityManager->flush();
            
            //return to admin create content Prophecy if ok
            return $this->redirectToRoute($route, ['id' => $id]);
        }
        
        if($request->getPathInfo() == '/admin/campaign/'.$id.'/prophecy/new-wound')
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
