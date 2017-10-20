<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\CategoryManager;
use AuPenDuick\Model\CompagnyManager;
use AuPenDuick\Model\FoodManager;

/**
 * Class HomeController
 * @package AuPenDuick\Controller
 */
class HomeController extends Controller
{
    public function homeAction()
    {
        // Appel Compagny (Model)
        $CompagnyManager = new CompagnyManager();
        $CompagnyManagerContent = $CompagnyManager->findAllCompagny();

        // Appel de la vue
        return $this->twig->render('home.html.twig', [
            'compagny' => $CompagnyManagerContent[0],
        ]);
    }

    public function menuContentAction()
    {
        // Appel Compagny (Model)
        $compagnyManager = new CompagnyManager();
        $compagnyManagerContent = $compagnyManager->findAllCompagny();

        // Appel Foodt (Model)
        $foodManager = new FoodManager();
        $foodSaltManagerContent = $foodManager->findAllFoodSalt();
        $foodSugarManagerContent = $foodManager->findAllFoodSugar();

        // Appel Category (Model)
        $categoryManager = new CategoryManager();
        $categoryManagerContent = $categoryManager->findAllCategory();

//        var_dump($compagnyManagerContent);
//        var_dump($foodSaltManagerContent);
//        var_dump($foodSugarManagerContent);
//        var_dump($categoryManagerContent);

        // Appel de la vue
        return $this->twig->render('menucontent.html.twig', [
            'compagny' => $compagnyManagerContent,
            'foodsSalt' => $foodSaltManagerContent,
            'foodsSugar' => $foodSugarManagerContent,
            'category' => $categoryManagerContent,
        ]);
    }
}