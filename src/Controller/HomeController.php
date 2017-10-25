<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\CompanyManager;
use AuPenDuick\Model\CategoryManager;
use AuPenDuick\Model\FoodManager;
use AuPenDuick\Model\Food;
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

        $menus = [];

        // Récupération des catégories en fonction de l'id du type
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

    public function menuAdminAction()
    {
        // Récupération de tous les types (salé,sucré)
        $typeManager = new TypeManager();
        $types = $typeManager->findAllType();

        $menus = [];

        // Récupération des catégories en fonction de l'id du type
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

        return $this->twig->render('menuAdmin.html.twig', [
            'menus' => $menus,
        ]);
    }

    public function addCrepe()
    {
        // récupérer $_POST et traiter
        $errors = [];

        // creation d'un objet person vide
        $crepe = new Food();

        if (!empty($_POST)) {

            // traitement des erreurs éventuelles
            $crepe->setTitle($_POST['title']);
            $crepe->setDescription($_POST['description']);
            $crepe->setPrice($_POST['price']);
            $crepe->setCategoryId($_POST['category']);

            if (empty($_POST['title'])) {
                $errors[] = 'Title is required';
            } elseif (strlen($_POST['title']) < 3) {
                $errors[] = 'Title should be at least 3 characters';
            }
            if (empty($_POST['description'])) {
                $errors[] = 'Description is required';
            }

            if (empty($_POST['price'])) {
                $errors[] = 'Price is required';
            }

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {

                $foodManager = new FoodManager();
                $foodManager->insertFood($crepe);

                header('Location: index.php?route=admin');
            }
        }

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();

        return $this->twig->render('addFood.html.twig', [
            'errors' => $errors,
            'categories' => $categories,
            'crepe' => $crepe,
        ]);
    }

    public function deleteCrepe()
    {
        if (!empty($_POST['id'])) {
            $FoodManager = new FoodManager();
            $food = $FoodManager->findOneFood($_POST['id']);
            $FoodManager->deleteFood($food);
            header('Location: index.php?route=admin');
        }
    }
}
