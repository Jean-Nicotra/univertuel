<?php

/*******************************************************************************************************************
 name      : FigureController.php
 Role      : Controller for all figure routes in Prophecy game only. Please, create one FigureController by game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Figure;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureWound;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureCurrency;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureCaracteristicsFormType;
use App\Form\Game\Prophecy\Figure\ProphecyCreateFigureFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureMajorAttributesFormType;
use App\Entity\Game\Figure;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureCasteFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureAgeFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureBackgroundFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureOmenFormType;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureMinorAttributesFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureNationFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureProhibitedFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureTendenciesFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyModifierByAge;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureDisadvantagesFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureDisadvantage;
use App\Form\Game\Prophecy\Figure\EditProphecyDisadvantageFormType;
use Doctrine\Common\Collections\ArrayCollection;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureSkillFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureSpheresFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureReputationType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureProhibited;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureProhibitedFormType;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureDisadvantageFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureAdvantage;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureAdvantageFormType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyInitialCurrencies;
use App\Entity\Game\Roll;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureSpell;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureMageInitialSpellFormType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureFavour;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureInitialFavourFormType;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureWeaponFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureWeapon;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureArmor;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureArmorFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureShield;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureShieldFormType;
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\ProphecySkillCost;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureArmorFormType;
use App\Form\Game\Prophecy\Figure\EditProphecyFigureSkillByMasterFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWounds;


class FigureController extends AbstractController
{
    public function figures(Request $request)
    {
        $user = $this->getUser();
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figures = $figureRepository->findBy(['owner' => $user]);
        
        return $this->render('memberArea/figure/prophecy/figures.html.twig', [
            'figures' => $figures,
        ]);
    }
    
    /**
     * Role : Init figure database : figureWound, figureMajorAttribute...
     * @param Request $request
     * @param ProphecyFigure $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newFigure(Request $request,$id, $thread )
    {
        $user = $this->getUser();        
        $interfaceFigure = new Figure();
        
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($id);
        $figure = new ProphecyFigure();
        
        //figureCaracteristics
        $caracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic');
        $caracteristics = $caracteristicRepository->findBy(['campaign' => $campaign]);
        
        //figureMajorAttribute
        $majorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute');
        $majorAttributes = $majorAttributeRepository->findBy(['campaign' => $campaign]);

        //figureMinorAttribute
        $minorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute');
        $minorAttributes = $minorAttributeRepository->findBy(['campaign' => $campaign]);
        
        //figureTendency
        $tendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency');
        $tendencies = $tendencyRepository->findBy(['campaign' => $campaign]);
        
        //figureSkill
        $skillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill');
        $skills = $skillRepository->findBy(['campaign' => $campaign]);
        
        //figureWound
        $woundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound');
        $wounds = $woundRepository->findBy(['campaign' => $campaign]);
        
        //figureDiscipline
        $disciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline');
        $disciplines = $disciplineRepository->findBy(['campaign' => $campaign]);
        
        //figureSphere
        $sphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $spheres = $sphereRepository->findBy(['campaign' => $campaign]);
        
        //figureCurrency
        $currencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\World\ProphecyCurrency');
        $currencies = $currencyRepository->findBy(['campaign' => $campaign]);
        
        $figure->setOwner($user);
        $figure->setCampaign($campaign);
        //$figure->setXperience(70);	//MODIFIER AVEC POINTS DE DEPARTS EN FONCTION DE L AGE
        
        $form = $this->createForm(ProphecyCreateFigureFormType::class, $figure);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($figure);
            
            //setup figureCaracteristic
            foreach ($caracteristics as $caracteristic)
            {
                $figureCaracteristic = new ProphecyFigureCaracteristic();
                $figureCaracteristic->setCaracteristic($caracteristic);
                $figureCaracteristic->setFigure($figure);
                $em->persist($figureCaracteristic);
                $em->flush();
            }
            
            //setup majorAttribute
            foreach ($majorAttributes as $majorAttribute)
            {
                $figureMajorAttribute = new ProphecyFigureMajorAttribute();
                $figureMajorAttribute->setFigure($figure);
                $figureMajorAttribute->setMajorAttribute($majorAttribute);
                $em->persist($figureMajorAttribute);
                $em->flush($figureMajorAttribute);
            }
            
            //setup minorAttribute
            foreach($minorAttributes as $minorAttribute)
            {
                $figureMinorAttribute = new ProphecyFigureMinorAttribute();
                $figureMinorAttribute->setFigure($figure);
                $figureMinorAttribute->setMinorAttribute($minorAttribute);
                $em->persist($figureMinorAttribute);
                $em->flush($figureMinorAttribute);
            }
            
            //setup tendency
            foreach($tendencies as $tendency)
            {
                $figureTendency = new ProphecyFigureTendency();
                $figureTendency->setFigure($figure);
                $figureTendency->setTendency($tendency);
                $em->persist($figureTendency);
                $em->flush($figureTendency);
            }
            
            //setup skill
            foreach($skills as $skill)
            {
                $figureSkill = new ProphecyFigureSkill();
                $figureSkill->setFigure($figure);
                $figureSkill->setSkill($skill);
                $em->persist($figureSkill);
                $em->flush($figureSkill);
            }
            
            //setup wound
            foreach($wounds as $wound)
            {
                $figureWound = new ProphecyFigureWound();
                $figureWound->setFigure($figure);
                $figureWound->setWound(null);
                $em->persist($figureWound);
                $em->flush($figureWound);
            }
            
            //setup discipline
            foreach($disciplines as $discipline)
            {
                $figureDiscipline = new ProphecyFigureDiscipline();
                $figureDiscipline->setFigure($figure);
                $figureDiscipline->setDiscipline($discipline);
                $em->persist($figureDiscipline);
                $em->flush($figureDiscipline);
            }
            
            //setup discipline
            foreach($spheres as $sphere)
            {
                $figureSphere = new ProphecyFigureSphere();
                $figureSphere->setFigure($figure);
                $figureSphere->setSphere($sphere);
                $em->persist($figureSphere);
                $em->flush($figureSphere);
            }
            
            //setup currency
            foreach($currencies as $currency)
            {
                $figureCurrency = new ProphecyFigureCurrency();
                $figureCurrency->setFigure($figure);
                $figureCurrency->setCurrency($currency);
                if($currency->getName() == "bronze")
                {
                    $figureCurrency->setValue(10);
                }
                $em->persist($figureCurrency);
                $em->flush($figureCurrency);
            }
            
            $em->flush();
        
            $figures = $figureRepository->findBy(['owner' => $user]);
            
            //add to App\Entity\Game\Figure
            $interfaceFigure->setCampaign($campaign);
            $interfaceFigure->setFigure($figure->getId());
            $interfaceFigure->setOwner($user);
            $interfaceFigure->setName($figure->getName());
            $em->persist($interfaceFigure);
            $em->flush();
            
            return $this->redirectToRoute('figures', ['figures' => $figures]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_new_figure.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    
    /**
     * 
     * Figure $id
     * @return \Symfony\Component\HttpFoundation\Response
     * role: display caracteristics figure page
     */
    public function figureCaracteristics($id): Response
    {

        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($id);
        
        $skillCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $skillcategories = $skillCategoryRepository->findBy(['campaign' => $campaign]);
        
        //add caracteristics to figure's view
        $figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        $caracteristics = $figureCaracteristicRepository->findBy(['figure' => $figure]);
        
        //add majorAttributes to figure's view
        $figureMajorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute');
        $majorAttributes = $figureMajorAttributeRepository->findBy(['figure' => $figure]);
        
        //add minorAttributes to figure's view
        $figureMinorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute');
        $minorAttributes = $figureMinorAttributeRepository->findBy(['figure' => $figure]);
        
        //add tendencies to figure's view
        $figureTendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency');
        $tendencies = $figureTendencyRepository->findBy(['figure' => $figure]);
        
        //add skills to figure's view
        $figureSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill');
        $skills = $figureSkillRepository->findBy([
            'figure' => $figure,
            'isDisplay' => true,
        ]);
        
        //add spheres to figure's view
        $figureSphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere');
        $spheres = $figureSphereRepository->findBy(['figure' => $figure]);
        
        //add wounds to figure's view
        $figureWoundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureWound');
        $wounds = $figureWoundRepository->findBy(['figure' => $figure]);
        
        
        return $this->render('memberArea/figure/prophecy/figure_caracteristics.html.twig', [
            'figure' => $figure,
            'caracteristics' => $caracteristics,
            'majorAttributes' => $majorAttributes,
            'minorAttributes' => $minorAttributes,
            'tendencies' => $tendencies,
            'skills' => $skills,
            'spheres' => $spheres,
            'skillCategories' => $skillcategories,
            'wounds' => $wounds,
        ]);

    }
    
    
    public function figureMagic($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
                                                                                             
        $figureDisciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline');
        $disciplines = $figureDisciplineRepository->findBy(['figure' => $figure]);
        
        $figureSphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere');
        $spheres = $figureSphereRepository->findBy(['figure' => $figure]);
        
        $figureSpellRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSpell');
        $spells = $figureSpellRepository->findBy(['figure' => $figure]);
        
        return $this->render('memberArea/figure/prophecy/figure_magic.html.twig',[
                'figure' => $figure, 
                'disciplines' => $disciplines,
                'spheres' => $spheres,
                'spells' => $spells
            ]);
    }
    
    public function figureEquipment($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        //add currencies to figure's view
        $figureCurrencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCurrency');
        $currencies = $figureCurrencyRepository->findBy(['figure' => $figure]);
        
        return $this->render('memberArea/figure/prophecy/figure_equipment.html.twig', [
            'figure' => $figure,
            'currencies' => $currencies,
        ]);
    }
    

    /**
     * 
     * @param ProphecyFigure $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function figureCaste($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        return $this->render('memberArea/figure/prophecy/figure_caste.html.twig', [
            'figure' => $figure,      
        ]);
    }

    /**
     * 
     * @param ProphecyFigure $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function figureBackground($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form =  $this->createForm(InitialiseProphecyFigureBackgroundFormType::class, $figure );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/figure_background.html.twig', [
            'figure' => $figure,
        ]);
    }

    
    public function figureEditInitialWounds($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign_id = $figure->getCampaign()->getId();
        $campaign = $campaignRepository->find($campaign_id);
        //$res = $figure->getCaracteristics()->getCaracteristic()->getName('resistance')->getValue();
        //$vol = $figure->getCaracteristics()->getCaracteristic()->getName('volonte')->getValue();
        $sum = 12;
        
        $woundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWounds');
        //$wounds = $woundRepository->findBy(['campaign' => $campaign]);
        $wounds = $woundRepository->findByMinMax($sum,$campaign);
        //$wounds = $woundRepository->findAll(); 
        $figureWoundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureWound');
        $figureWounds = $figureWoundRepository->findBy(['figure' => $figure]);        
        $i = 0;

        foreach ($figureWounds as $figureWound)
        {
            $figureWound->setWound($wounds[$i]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureWound);
            $entityManager->flush();
            $i++;
        }
        
        return $this->render('memberArea/figure/prophecy/test.html.twig', [
            'figure' => $figure, 
        ]);
    }
   
    public function figureEditInitialOmen(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $campaign_id = $figure->getCampaign()->getId();
        
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($campaign_id);
        
        $omenRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen');
        $omenList = $omenRepository->findBy(['campaign' => $campaign]); 
        
        $form =  $this->createForm(InitialiseProphecyFigureOmenFormType::class, $figure, [
            'omenList' => $omenList,
        ] );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);    
        
    }
    
    
    /**
     * Role: to the figure creation, edit initial caracteristic
     * @param Request $request
     * @param ProphecyFigure $id
     *
     *ca marche : ca affiche les caracteristiques et une valeur à choisir -   reste a faire : la liste doit pouvoir etre customisée
     */
    public function figureEditInitialCaracteristic(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        $figure = $figureRepository->find($id);
        $figureCaracteristics = $figureCaracteristicRepository->findByFigure(['figure' => $figure]);
        
        $startValues = [7,6,6,5,5,4,4,3];
        
        $form =  $this->createForm(InitialiseProphecyFigureCaracteristicsFormType::class, $figure, [
        ] );
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $figure->setIsCaracteristicsChoosen(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(), 
            'figure' => $figure, 
            'figureCaracteristics' => $figureCaracteristics,
            'startValues' => $startValues,
        ]);    
    }
    
    public function figureEditInitialMajorAttribute(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $figureMajorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute');
        $figureMajorAttributes = $figureMajorAttributeRepository->findByFigure(['figure' => $figure]);
        
        $form = $this->createForm(InitialiseProphecyFigureMajorAttributesFormType::class, $figure );
        $form->handleRequest($request);
        
        $startValues = [5,4,4,3];
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $figure->setIsMajorAttributesChoosen(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
            'startValues' => $startValues,
        ]);
    }
    
    public function figureEditInitialMinorAttribute(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureMinorAttributesFormType::class, $figure );
        $form->handleRequest($request);
        
        $startValues = [5,4,4,3];
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $figure->setIsMinorAttributesChoosen(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
            'startValues' => $startValues,
        ]);
    }
    
    public function figureEditInitialCaste(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $campaign_id = $figure->getCampaign()->getId();
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($campaign_id);
        
        $casteRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste');
        $castes = $casteRepository->findBy(['campaign' => $campaign]);
        
        $form = $this->createForm(InitialiseProphecyFigureCasteFormType::class, $figure, [
            'castes' => $castes,
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(), 
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialAge(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        $figure = $figureRepository->find($id);

        $campaign_id = $figure->getCampaign()->getId();
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($campaign_id);
        
        $ageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge');
        $ages = $ageRepository->findBy(['campaign' => $campaign]); 
                
        $caracteristics = $figureCaracteristicRepository->findBy(['figure' => $figure]);
        
        $form = $this->createForm(InitialiseProphecyFigureAgeFormType::class, $figure, [
            'ages' => $ages,
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            //after age select
            $age = $figure->getAge();
            $modifierRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyModifierByAge');
            $modifiers = $modifierRepository->findBy(['age' => $age]);
            foreach ($caracteristics as $caracteristic)
            {
                foreach ($modifiers as $modifier)
                {
                    if($modifier->getCaracteristic()->getName() == $caracteristic->getCaracteristic()->getName())
                    {
                        $value = $modifier->getValue();
                        $caracteristic->setValue ($value);
                        $entityManager->persist($figure);
                        $entityManager->flush();
                    }
                }
                
            }
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
            /*
            return $this->render('memberArea/figure/prophecy/test.html.twig', [
                'figure' => $figure,
                'modifiers' => $modifiers,
            ]);
            */
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(), 
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialNation(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureNationFormType::class, $figure );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
            
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_nation.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    public function figureEditInitialProhibited(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $caste = $figure->getCaste();
        $campaign = $figure->getCampaign();

        
        $prohibitedRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited');
        //$prohibitedsList = $prohibitedRepository->findByCasteCampaign($caste, $campaign);
        $prohibitedsList = $prohibitedRepository->findBy(['campaign' => $campaign, 'caste' => $caste]);
        
        $figureProhibited = new ProphecyFigureProhibited();
        $figureProhibited->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureProhibitedFormType::class, $figureProhibited, [
            'prohibiteds' => $prohibitedsList,
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureProhibited);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    /** ATTENTION $FREEPOINTS DANS LA CLASSE PROPHECYTENDENCY ILS FAUT AFFECTER LES BONNES VALEURS SELON LA TABLE NATION */
    public function figureEditInitialTendency(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureTendenciesFormType::class, $figure);
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $figure->setIsTendenciesChoosen(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_initial_tendencies.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    //charger les categories selon l age et charger la liste dans le formulaire, et changer entitytype par choice
    public function figureEditInitialDisadvantages (Request $request, $id)
    {
        
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $advantagePoints = 0;
        
        $age = $figure->getAge();
        $ageDisadvantagesRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAgeDisadvantage');
        $ageDisadvantagesList = $ageDisadvantagesRepository->findBy(['age' => $age ]);
        
        $disadvantageRepository =  $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage');
        $disadvantagesList = new ArrayCollection();
        
        $figureDisadvantage = new ProphecyFigureDisadvantage();
        $figureDisadvantage->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureDisadvantageFormType::class, $figureDisadvantage );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureDisadvantage);
            $entityManager->flush();
            
            $advantagePoints = $figureDisadvantage->getDisadvantage()->getInitialCost();
            $figure->setAddAdvantagePoints ($advantagePoints);
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_disadvantages.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
            'ageDisadvantagesList' => $ageDisadvantagesList
        ]);
        
    }
    
    //general accessible a tous, enfants uniquement enfants et adolescents, venerables uniquement anciens et venerables
    //
    public function figureEditInitialAdvantages (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
              
        $advantageRepository =  $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage');
        $advantagesList = new ArrayCollection();
        
        $figureAdvantage = new ProphecyFigureAdvantage();
        $figureAdvantage->setFigure($figure);
         
        $form = $this->createForm(AddProphecyFigureAdvantageFormType::class, $figureAdvantage );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureAdvantage);
            $entityManager->flush();
            
            $advantagePoints = $figureAdvantage->getAdvantage()->getInitialCost();
            $figure->setRemoveAdvantagePoints ($advantagePoints);
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_disadvantages.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    /*
     * A FINIR
     * 
     */
    public function figureEditInitialCurrencies($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $caste = $figure->getCaste();
        $initialCurrenciesRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyInitialCurrencies');
        $initialCurrency = $initialCurrenciesRepository->findOneBy(['caste' => $caste]); 
        
        $currency = $initialCurrency->getCurrency();
        $roll = new Roll(10, 8); 
        $value = $roll->getSum();
        
        $figureCurrencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCurrency');
        $figureCurrency = $figureCurrencyRepository->findOneBy(['figure' => $figure, 'currency' => $currency ]);
        $figureCurrency->setCurrency($currency);
        $figureCurrency->setFigure($figure);
        $figureCurrency->setValue($value);
        $figure->setIsInitialCurrenciesGenerated(true);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($figureCurrency);
        $entityManager->flush();
        
        $entityManager->persist($figure);
        $entityManager->flush();
        
        
        //return $this->render('test.html.twig', ['currency' => $currency->getName(), 'value' => $value]);
        
        return $this->redirectToRoute('prophecy_figure_view', [
            'id' => $figure->getId(),
        ]);
        
    }
    
    public function figureEditInitialSkills(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $campaign = $figure->getCampaign(); 
        
        $limitSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\ProphecyStartSkill');
        $figureAge = $figure->getAge();
        $limitSkill = $limitSkillRepository->findOneBy([
            'age' => $figureAge,
            'campaign' => $campaign,
        ]);
        $limit = $limitSkill->getValue();
        
        $skillCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $skillCategories = $skillCategoryRepository->findBy(['campaign' => $campaign]);
        
        $form = $this->createForm(InitialiseProphecyFigureSkillFormType::class, $figure, ['limit' => $limit]);
        $form->handleRequest($request);
        
        $costSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\ProphecySkillCost');
        $skills = $figure->getSkills();
        
        $costSkill = new ProphecySkillCost();
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_skills.html.twig' ,[
        //return $this->render('memberArea/figure/prophecy/test.html.twig' ,[
            'form' =>$form->createView(),
            'figure' => $figure,
            'skillCategories' => $skillCategories,
        ]);
    }
    
    public function figureEditInitialBackground(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureBackgroundFormType::class, $figure);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    public function figureEditInitialSpheres (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $campaign = $figure->getCampaign();
        
        $sphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $spheres = $sphereRepository->findBy(['campaign' => $campaign]);

        $form = $this->createForm(InitialiseProphecyFigureSpheresFormType::class, $figure, [
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_spheres.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
            'spheres' => $spheres,
        ]);
    }
    
    //les sorts sont gratuits
    public function figureEditInitialMagesSpells (Request $request, $id, $sphere)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $campaign = $figure->getCampaign();
         
        //pour alimenter la liste des choix
        $sphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $spellRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySpell');
        $prophecySphere = $sphereRepository->find($sphere);
        //$spellsList = $spellRepository->findBySphereCampaign($campaign, $prophecySphere);
        $spellsList = $spellRepository->findBy([
            'campaign' => $campaign,
            'sphere' => $prophecySphere,
        ]);
        
        $figureSpell = new ProphecyFigureSpell();
        $figureSpell->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureMageInitialSpellFormType::class, $figureSpell, [
            'spellsList' => $spellsList
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureSpell);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_spells.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
        
    }
    
    //les sorts se paient
    public function figureEditAdditionalInitialSpells (Request $request, $id, $sphere)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $campaign = $figure->getCampaign();
        
        //pour alimenter la liste des choix
        $sphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $spellRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySpell');
        $prophecySphere = $sphereRepository->find($sphere);
        $spellsList = $spellRepository->findBySphereCampaign($prophecySphere, $campaign);
        //$spellsList = $spellRepository->findBy([
        //    'campaign' => $campaign,
        //    'sphere' => $prophecySphere,
        //]);
        
        $figureSpell = new ProphecyFigureSpell();
        $figureSpell->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureMageInitialSpellFormType::class, $figureSpell, [
            'spellsList' => $spellsList
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureSpell);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_spells.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialFavour (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $campaign = $figure->getCampaign();
        $caste = $figure->getCaste();
        
        $figureFavour = new ProphecyFigureFavour();
        $figureFavour->setFigure($figure);
        
        $favourRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour');
        $FavoursList = $favourRepository->findByFavourCampaign($caste, $campaign);
        
        $form = $this->createForm(AddProphecyFigureInitialFavourFormType::class, $figureFavour, [
            'favoursList' => $FavoursList
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureFavour);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    public function figureEditInitialReputation (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureReputationType::class, $figure);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_reputation.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialWeapons (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $figureWeapon = new ProphecyFigureWeapon();
        $figureWeapon->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureWeaponFormType::class, $figureWeapon);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureWeapon);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialArmors (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $figureArmor = new ProphecyFigureArmor();
        $figureArmor->setFigure($figure);
        
        $armorRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Item\ProphecyArmor');
        $armors = $armorRepository->findAll();
        
        $form = $this->createForm(AddProphecyFigureArmorFormType::class, $figureArmor);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureArmor);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_armor.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
            'armors' => $armors
        ]);
    }
    
    public function figureEditInitialShields (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $figureShield = new ProphecyFigureShield();
        $figureShield->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureShieldFormType::class, $figureShield);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureShield);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    //SERT A INDIQUER QUE L USER A VALIDE SON PERSONNAGE ET QU IL EST PRET A ETRE CONTROLE ET VALIDE PAR LE MJ A FINIR
    public function figurePlayerValidation($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        //pour tester si la fonction marche???
        $figure->setXperience(20);

        //valide le personnage pour le joueur
        $figure->setIsFinish(true);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($figure);
        $entityManager->flush();
        
         return $this->redirectToRoute('prophecy_figure_view', [
            'id' => $figure->getId(),
        ]);
        
    }
    
    public function figureMasterValidation ($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        //validation du personnage par le game master
        $figure->setIsValide(true);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($figure);
        $entityManager->flush();
        
        return $this->redirectToRoute('prophecy_figure_view', [
            'id' => $figure->getId(),
        ]);
    }
    
    public function figureView ($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $skillCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $skillcategories = $skillCategoryRepository->findAll();
        
        //add caracteristics to figure's view
        //$figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        //$caracteristics = $figureCaracteristicRepository->findBy(['figure' => $figure]);
        
        //add majorAttributes to figure's view
        $figureMajorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute');
        $majorAttributes = $figureMajorAttributeRepository->findBy(['figure' => $figure]);
        
        //add minorAttributes to figure's view
        $figureMinorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute');
        $minorAttributes = $figureMinorAttributeRepository->findBy(['figure' => $figure]);
        
        //add tendencies to figure's view
        //$figureTendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency');
        //$tendencies = $figureTendencyRepository->findBy(['figure' => $figure]);
        
        //add skills to figure's view
        $figureSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill');
        $skills = $figureSkillRepository->findBy(['figure' => $figure]);
        
        //add wounds to figure's view
        $figureWoundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureWound');
        $wounds = $figureWoundRepository->findBy(['figure' => $figure]);
 
        //magic
        $figureDisciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline');
        $disciplines = $figureDisciplineRepository->findBy(['figure' => $figure]);
        
        $figureSphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere');
        $spheres = $figureSphereRepository->findBy(['figure' => $figure]);
        
        if ($figure->getIsFinish())
        {
            return $this->redirectToRoute('prophecy_figure_caracteristics', [
                'id' => $id,
            ]);
        }
            
        return $this->render('memberArea/figure/prophecy/figure_initialisation.html.twig', [
            'figure' => $figure,
            //'caracteristics' => $caracteristics,
            //'majorAttributes' => $majorAttributes,
            'minorAttributes' => $minorAttributes,
            //'tendencies' => $tendencies,
            //'skills' => $skills,
            'skillCategories' => $skillcategories,
            //'wounds' => $wounds,
            //'disciplines' => $disciplines,
            //'spheres' => $spheres,
        ]);
    }
    
    public function figureDelete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $figureMainRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Figure');
        $mainFigure = $figureMainRepository->findOneBy(['figure' => $figure->getId(), 'campaign' => $figure->getCampaign()]);
        $entityManager->remove($mainFigure);
        
        $figureAdvantageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureAdvantage');
        $figureAdvantages = $figureAdvantageRepository->findBy(['figure' => $figure]);
        foreach ($figureAdvantages as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureArmorRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureArmor');
        $figureArmors = $figureArmorRepository->findBy(['figure' => $figure]);
        foreach ($figureArmors as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        $figureCaracteristics = $figureCaracteristicRepository->findBy(['figure' => $figure]);
        foreach ($figureCaracteristics as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureCurrencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCurrency');
        $figureCurrencies = $figureCurrencyRepository->findBy(['figure' => $figure]);
        foreach ($figureCurrencies as $element)
        {
            $entityManager->remove($element);
        }
              
        $figureDisadvantageRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureDisadvantage');
        $figureDisadvantages =  $figureDisadvantageRepository->findBy(['figure' => $figure]);
        foreach ($figureDisadvantages as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureDisciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline');
        $figureDisciplines = $figureDisciplineRepository->findBy(['figure' => $figure]);
        foreach ($figureDisciplines as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureFavourRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureFavour');
        $figureFavours = $figureFavourRepository->findBy(['figure' => $figure]);
        foreach ($figureFavours as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureMajorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute');
        $figureMajorAttributes = $figureMajorAttributeRepository->findBy(['figure' => $figure]);
        foreach ($figureMajorAttributes as $element)
        {
            $entityManager->remove($element);
        } 
        
        $figureMinorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute');
        $figureMinorAttributes = $figureMinorAttributeRepository->findBy(['figure' => $figure]);
        foreach ($figureMinorAttributes as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureProhibitedRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureProhibited');
        $figureProhibiteds = $figureProhibitedRepository->findBy(['figure' => $figure]);
        foreach ($figureProhibiteds as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureShieldRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureShield');
        $figureShields = $figureShieldRepository->findBy(['figure' => $figure]);
        foreach ($figureShields as $element)
        {
            $entityManager->remove($element);
        }
        
        $figureSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill');
        $figureSkills = $figureSkillRepository->findBy(['figure' => $figure]);
        foreach ($figureSkills as $element)
        {
            $entityManager->remove($element);
        }    
        
        $figureSpellRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSpell');
        $figureSpells = $figureSpellRepository->findBy(['figure' => $figure]);
        foreach ($figureSpells as $element)
        {
            $entityManager->remove($element);
        }   
        
        $figureSphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere');
        $figureSpheres = $figureSphereRepository->findBy(['figure' => $figure]);
        foreach ($figureSpheres as $element)
        {
            $entityManager->remove($element);
        }   
        
        $figureTendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency');
        $figureTendencies = $figureTendencyRepository->findBy(['figure' => $figure]);
        foreach ($figureTendencies as $element)
        {
            $entityManager->remove($element);
        } 
        
        $figureWeaponRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureWeapon');
        $figureWeapons = $figureWeaponRepository->findBy(['figure' => $figure]);
        foreach ($figureWeapons as $element)
        {
            $entityManager->remove($element);
        } 
        
        $figureWoundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureWound');
        $figureWounds = $figureWoundRepository->findBy(['figure' => $figure]);
        foreach ($figureWounds as $element)
        {
            $entityManager->remove($element);
        } 
        
        $logRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Log\Log');
        $logs = $logRepository->findBy(['figure' => $figure]);
        foreach ($figureWounds as $element)
        {
            $entityManager->remove($element);
        } 
        
        $entityManager->remove($figure);
        $entityManager->flush();
        
        return $this->redirectToRoute('member_homepage');
    }
    
    public function figureTest ($id, Request $request)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $limitSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\ProphecyStartSkill');
        $figureAge = $figure->getAge();
        $limitSkill = $limitSkillRepository->findOneBy(['age' => $figureAge]);
        $limit = $limitSkill->getValue();
        
        $skillCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $skillCategories = $skillCategoryRepository->findAll();
        
        $form = $this->createForm(InitialiseProphecyFigureSkillFormType::class, $figure, ['limit' => $limit]);
        $form->handleRequest($request);
        
        $costSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\ProphecySkillCost');
        $skills = $figure->getSkills();
        
        $costSkill = new ProphecySkillCost();
        
        if ($form->isSubmitted() && $form->isValid())
        {          
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();                  
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/initialisation/initialisation_skills.html.twig' ,[
            'form' =>$form->createView(),
            'figure' => $figure,
            'skillCategories' => $skillCategories,
        ]);
    }
    
    public function figureMasterEditFigureSkills($id, Request $request)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $campaignId = $figure->getCampaign()->getId();
        
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\campaign');
        $campaign = $campaignRepository->find($campaignId);
        
        $skillCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $skillCategories = $skillCategoryRepository->findBy(['campaign' => 18]);
        
        $form = $this->createForm(EditProphecyFigureSkillByMasterFormType::class, $figure);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_master_edit_figure_skills.html.twig' ,[
            'form' =>$form->createView(),
            'figure' => $figure,
            'skillCategories' => $skillCategories,
            
        ]);
        
    }
       
}
