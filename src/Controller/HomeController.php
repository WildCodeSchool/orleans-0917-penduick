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
        $compagnyManager = new CompagnyManager();
        $compagnyManagerContent = $compagnyManager->findAllCompagny();

        // Appel de la vue
        return $this->twig->render('home.html.twig', [
            'compagny' => $compagnyManagerContent[0],
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

        // Appel de la vue
        return $this->twig->render('menucontent.html.twig', [
            'compagny' => $compagnyManagerContent[0],
            'foodsSalt' => $foodSaltManagerContent,
            'foodsSugar' => $foodSugarManagerContent,
            'category' => $categoryManagerContent,
        ]);
    }
}