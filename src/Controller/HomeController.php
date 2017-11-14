<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\CompanyTextManager;
use AuPenDuick\Model\CompanyPictureManager;
use AuPenDuick\Model\CategoryManager;
use AuPenDuick\Model\FoodManager;
use AuPenDuick\Model\TypeManager;
use AuPenDuick\Model\Extra;
use AuPenDuick\Model\ExtraManager;

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
        // Appel companyText
        $companyTextManager = new CompanyTextManager();
        $companyTextManagerContent = $companyTextManager->findAll();

        // Récupération des photos de la carte
        $companyPicturesManager = new CompanyPictureManager();
        $pictures = $companyPicturesManager->findAll();
        $listPictures = [];
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

        // Extra
        $extraManager = new ExtraManager();
        $extras = $extraManager->findAll();
        $formatedExtras = [];

        foreach ($extras as $extra) {
            $type =  $typeManager->findOneType($extra->getTypeId());
            $formatedExtras[$type->getConsistency()][] = $extra;
        }

        return $this->twig->render('menucontent.html.twig', [
            'menus' => $menus,
            'pictures' => $listPictures,
            'extras' => $formatedExtras,
            'company' => $companyTextManagerContent[0],
        ]);
    }

    public function legalNoticeAction()
    {
        // Return
        return $this->twig->render('legalNotice.html.twig');
    }
}

