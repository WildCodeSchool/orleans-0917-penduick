<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\CompanyTextManager;
use AuPenDuick\Model\CompanyPictureManager;
use AuPenDuick\Model\CategoryManager;
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
        // Appel companyText
        $companyTextManager = new CompanyTextManager();
        $companyTextManagerContent = $companyTextManager->findAll();

        // Appel category
        $categoryManager = new CategoryManager();
        $categoryManagerContent = $categoryManager->findAll();

        // Return
        return $this->twig->render('home.html.twig', [
            'company' => $companyTextManagerContent[0],
            'categories' => $categoryManagerContent,
        ]);
    }

    public function menuContentAction()
    {
        // Récupération des photos de la carte
        $companyPicturesManager = new CompanyPictureManager();
        $pictures = $companyPicturesManager->findAll();
        foreach ($pictures as $picture) {
            $listPictures[] = $picture;
        }

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
            'pictures' => $listPictures,
        ]);
    }

}
