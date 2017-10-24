<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\CategoryManager;
use AuPenDuick\Model\CompanyManager;
use AuPenDuick\Model\FoodManager;
use AuPenDuick\Model\TypeManager;

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
        // Récupération de tous les types (salé,sucré)
        $typeManager = new TypeManager();
        $types = $typeManager->findAllType();

        // Récupération des catégories en fonction de l'id du type
        $menus = [];
        foreach ($types as $type) {
            $categoryManager = new CategoryManager();
            $categories = $categoryManager->findByType($type->getId());

            // Récupération des crêpes en fonction de l'id de la catégorie
            foreach ($categories as $category) {
                $foodManager = new FoodManager();
                $foods = $foodManager->findByCategory($category->getId());

                // Tableau des crêpes en fonction du type et de la catégorie
                foreach ($foods as $food) {
                    $menus[$type->getConsistency()][$category->getName()][] = $food;
                }
            }
        }

        return $this->twig->render('menucontent.html.twig', [
            'menus' => $menus,
        ]);
    }
}
