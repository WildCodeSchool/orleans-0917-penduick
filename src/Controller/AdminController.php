<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\CompanyTextManager;
use AuPenDuick\Model\CompanyPictureManager;
use AuPenDuick\Model\CategoryManager;
use AuPenDuick\Model\Food;
use AuPenDuick\Model\FoodManager;
use AuPenDuick\Model\TypeManager;

class AdminController extends Controller
{
    public function adminAction()
    {
        return $this->twig->render('Admin/admin.html.twig');
    }

    public function deleteMenuAction()
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

        return $this->twig->render('Admin/deleteMenu.html.twig', [
            'menus' => $menus,
        ]);
    }

    public function updatePriceAction(){
        return $this->twig->render('Admin/updatePrice.html.twig');
    }

    public function addTypeAction(){
        return $this->twig->render('Admin/addType.html.twig');
    }

    public function addCategoryAction(){
        return $this->twig->render('Admin/addCategory.html.twig');
    }

    public function addPlatAction()
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
            }
        }

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();

        return $this->twig->render('Admin/addPlat.html.twig', [
            'errors' => $errors,
            'categories' => $categories,
            'crepe' => $crepe,
        ]);
    }

    public function deletePictureAction()
    {
        $uploadInfo = '';

        // Vérification si demande de delete
        if (!empty($_POST['delete'])) {

            // Récup id via form
            $id = (int) $_POST['delete'];

            // appel Class
            $upload = new CompanyPictureManager();

            // Delete de l'image dans le dossier upload
            $name = $upload->findOne($id);
            $fullName = $name->getName();
            $fullName .= $name->getExtension();
             unlink('pictures/upload/' . $fullName);

            // Delete via Model
            $upload->deleteById($id);

            // Message d'informations
            $uploadInfo = 'Suppression de l\'image réussie';
        }

        // Récupération de la lste des images
        $companyPictureManager = new CompanyPictureManager();
        $listPictures = $companyPictureManager->findAll();

        return $this->twig->render('Admin/deletePicture.html.twig', [
            'uploadInfo' => $uploadInfo,
            'listPictures' => $listPictures,
        ]);
    }

    public function addPictureAction()
    {
        $error = '';

        if (!empty($_FILES['upload'])) {

            // Nettoyage du name
            $_FILES['upload']['name'] = uniqid() . $_FILES['upload']['name'];

            // Vérification du type
            $extensions_valids = array('jpg', 'jpeg', 'gif', 'png');
            $extension_upload = strtolower(substr(strrchr($_FILES['upload']['name'], '.'), 1));
            if (!in_array($extension_upload, $extensions_valids)) {
                $error = 'le fichier n\'est pas du bon format';

            // Vérification de la taille
            } elseif ($_FILES['upload']['size'] >= 1000000)  {
                $error = 'la taille de l\'image est trop lourde';

            // Tout est bon
            } else {

                // Insert fichier upload
                move_uploaded_file($_FILES['upload']['tmp_name'], 'pictures/upload/' . $_FILES['upload']['name']);

                // Insert Bdd via Model
                $upload = new CompanyPictureManager();
                $upload->insertCompanyPicture($_FILES['upload']['name'], $extension_upload);
            }
        }

        return $this->twig->render('Admin/addPicture.html.twig', [
            'error' => $error,
        ]);
    }

    public function updateTextAction(){
        return $this->twig->render('Admin/updateText.html.twig');
    }
}