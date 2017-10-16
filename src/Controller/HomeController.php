<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\DisplayManager;

class HomeController extends Controller
{
    public function homeAction()
    {

        // appels éventuels aux données des modèles
        $displayManager = new DisplayManager();
        $displayTexts = $displayManager->findDisplayText();

        // appel de la vue
        return $this->twig->render('home.html.twig', [
            'displayTexts'=>$displayTexts,
//            'images'=>$texts, ($texts a remplacer par array image)
        ]);
    }
}