<?php

/*******************************************************************************************************************
    name      : PlatformController.php
    Role      : Controller for all platform objects and views
    author    : tristesire
    date      : 18/03/2022
*******************************************************************************************************************/

namespace App\Controller\Platform;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PlatformController extends AbstractController
{

    /**
     * Role : display homepage view of application 
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     * 
     */
    public function homepage (): Response
    {
        return $this->render('platform/homepage/homepage.html.twig');
    }
    
    /**
     * role: display homepage member view
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     */
    public function memberHomepage()
    {
        return $this->render('memberArea/homepage.html.twig', [
            'page_label' => 'panneau de controle'
        ]);
    }
    
    /**
     * role: display admin homepage view
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminHomepage()
    {
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        return $this->render('memberArea/admin/homepage.html.twig', [
            'games' => $games
        ]);
    }
    
    
    
    /**
     * display features platform univertuel template 
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function features()
    {
        return $this->render('platform/features/features.html.twig');
    }
    
    /**
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function help()
    {
        return $this->render('platform/help_in_line.html.twig');
    }
}
