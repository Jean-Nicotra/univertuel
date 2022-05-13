<?php

namespace App\Controller\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Game\Figure;
use App\Entity\Game\Game;

class FigureController extends AbstractController
{
    
    /**
     * role: display all figures for a member owner
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function figures()
    {
        $owner = $this->getUser();
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Figure');
        $figuresList = $figureRepository->findBy(['owner' => $owner ]);
        
        return $this->render('memberArea/figure/figures.html.twig', [
            'figures' => $figuresList,
        ]);
        
    }
    
    /**
     * role: find the target figure for a member
     * 
     * @param Figure $id
     * @param Game $game
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function figureFind($id, $game)
    {
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $game = $gameRepository->find($game);
        //format like Prophecy_figure_caracteristics or Cyberpunk_figure_caracteristics, etc...
        $route = $game->getInterfaceCode().'_figure_caracteristics';
        
        return $this->redirectToRoute($route, ['id' => $id]);
    }
}
