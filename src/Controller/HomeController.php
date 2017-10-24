<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\CategoryManager;
use AuPenDuick\Model\CompanyManager;
use AuPenDuick\Model\FoodManager;

/**
 * Class HomeController
 * @package AuPenDuick\Controller
 */
class HomeController extends Controller
{
    public function homeAction()
    {
        // Appel company (Model)
        $companyManager = new companyManager();
        $companyManagerContent = $companyManager->findAllcompany();

        // Appel de la vue
        return $this->twig->render('home.html.twig', [
            'company' => $companyManagerContent[0],
        ]);
    }

    public function menuContentAction()
    {
        // Appel company (Model)
        $companyManager = new companyManager();
        $companyManagerContent = $companyManager->findAllcompany();

        // Appel Foodt (Model)
        $foodManager = new FoodManager();
        $foodSaltManagerContent = $foodManager->findAllFood(1);
        $foodSugarManagerContent = $foodManager->findAllFood(2);

        // Appel Category (Model)
        $categoryManager = new CategoryManager();
        $categoryManagerContent = $categoryManager->findAllCategory();

        // Appel de la vue
        return $this->twig->render('menucontent.html.twig', [
            'company' => $companyManagerContent[0],
            'foodsSalt' => $foodSaltManagerContent,
            'foodsSugar' => $foodSugarManagerContent,
            'category' => $categoryManagerContent,
        ]);
    }
}