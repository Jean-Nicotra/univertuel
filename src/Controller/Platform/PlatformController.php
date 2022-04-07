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
     * Role : display homepage of application 
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homepage (): Response
    {
        return $this->render('platform/homepage/homepage.html.twig', []);
    }
    
    //afficher des liens pour des demandes/invitations e attente, ...
    public function memberHomepage()
    {
        return $this->render('memberArea/homepage.html.twig', ['page_label' => 'panneau de controle']);
    }
    
    
    //afficher des liens pour des demandes/invitations e attente, ...
    public function adminHomepage()
    {
        return $this->render('memberArea/admin/homepage.html.twig', []);
    }
    
    public function setupProphecy ()
    {
        return $this->render('memberArea/admin/game/prophecy\prophecy_setup.html.twig');
    }
}
