<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\CompanyTextManager;
use AuPenDuick\Model\CompanyText;
use AuPenDuick\Model\CompanyPictureManager;
use AuPenDuick\Model\CategoryManager;
use AuPenDuick\Model\Category;
use AuPenDuick\Model\Food;
use AuPenDuick\Model\FoodManager;
use AuPenDuick\Model\Type;
use AuPenDuick\Model\TypeManager;

class AdminController extends Controller
{
    const MaxSize = 1000000;
    const LimitPicture = 4;

    public function adminAction()
    {
        return $this->twig->render('Admin/admin.html.twig');
    }

    public function menuAction()
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
            if (!empty($_POST['id'])) {
                $foodManager = new FoodManager();
                $food = $foodManager->findOneFood($_POST['id']);
                $foodManager->deleteFood($food);
                header('Location: admin.php?route=menuAdmin');
            }
        }

        return $this->twig->render('Admin/menuAdmin.html.twig', [
            'menus' => $menus,
            'pictures' => $listPictures,
        ]);
    }

    public function addTypeAction()
    {
        // récupérer $_POST et traiter
        $errors = [];
        // creation d'un objet Type vide
        $type = new Type();

        if (!empty($_POST)) {
            // traitement des erreurs éventuelles
            $type->setConsistency($_POST['consistency']);

            if (empty($_POST['consistency'])) {
                $errors[] = 'Type is required';
            }

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {

                $typeManager = new TypeManager();
                $typeManager->insertType($type);

                header('Location: admin.php?route=addType');
            }
        }

        $typeManager = new TypeManager();
        $types = $typeManager->findAllType();

        return $this->twig->render('Admin/addType.html.twig', [
            'errors' => $errors,
            'type' => $type,
            'types' => $types,
        ]);
    }

    private function addOrUpdateAction(Food $food)
    {
        // traitement des erreurs éventuelles
        $food->setTitle($_POST['title']);
        $food->setDescription($_POST['description']);
        $food->setPrice($_POST['price']);
        $food->setCategoryId($_POST['category']);
        return $food;
    }

    private function checkError()
    {
        $errors = '';

        if (empty($_POST['title'])) {
            $errors[] = 'Title is required';
        }
        if (empty($_POST['description'])) {
            $errors[] = 'Description is required';
        }
        if (empty($_POST['price'])) {
            $errors[] = 'Price is required';
        }
        return $errors;
    }

    public function deleteTypeAction()
    {
        if (!empty($_POST['id'])) {
            $TypeManager = new TypeManager();
            $type = $TypeManager->findOneType($_POST['id']);
            $TypeManager->deleteType($type);
            header('Location: admin.php?route=addType');
        }
    }

    public function addCategoryAction()
    {
        // récupérer $_POST et traiter
        $errors = [];

        $fileUploadErrors = [
            0 => "Aucune erreur, le téléchargement est correct.",
            1 => "La taille du fichier téléchargé excède la valeur maximum",
            2 => "La taille du fichier téléchargé excède la valeur maximum",
            3 => "Le fichier n'a été que partiellement téléchargé.",
            4 => "Aucun fichier n'a été téléchargé.",
            6 => "Un dossier temporaire est manquant, contactez l'administrateur du site.",
            7 => "Échec de l'écriture du fichier sur le disque, contactez l'administrateur du site.",
            8 => "Erreur inconnu, contactez l'administrateur du site.",
        ];

        // creation d'un objet category vide
        $category = new Category();

        if (!empty($_FILES['picture']) && !empty($_POST)) {

            // traitement des erreurs éventuelles
            $category->setName($_POST['name']);
            $category->setNameShortcut($_POST['nameShortcut']);
            $category->setTypeId($_POST['type']);

            // Max 25 Caractères ShortCut
            if (strlen ($_POST['nameShortcut']) > 25) {
                $errors[] = 'Le titre raccourci ne peut excéder 25 caractères.';
            }

            $maxsize = 1048576;
            $extensions_valids = array('jpg', 'jpeg', 'gif', 'png');
            $extension_upload = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

            // Vérification image présente, si oui attribution nom unique
            if (empty($_FILES['picture']['name'])){
                $errors[] = 'A picture is required';
            } else {
                $_FILES['picture']['name'] = uniqid() . $_FILES['picture']['name'];
                $category->setPicture($_FILES['picture']['name']);
            }
            // Vérification du format
            if (!empty($_FILES['picture']['name']) && !in_array($extension_upload, $extensions_valids)) {
                $errors[] = 'le fichier n\'est pas du bon format';
            }
            // Vérification de la taille
            if ($_FILES['picture']['error']){
                $errors[] = $fileUploadErrors[$_FILES['picture']['error']];
            }

            if (empty($_POST['name'])) {
                $errors[] = 'Name is required';
            }
            if (empty($_POST['nameShortcut'])) {
                $errors[] = 'A shortcut name is required';
            }

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {

                move_uploaded_file($_FILES['picture']['tmp_name'], 'pictures/upload/' . $_FILES['picture']['name']);

                $categoryManager = new CategoryManager();
                $categoryManager->insertCategory($category);

                header('Location: admin.php?route=addCategory');
            }
        }

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();
        $typeManager = new TypeManager();
        $types = $typeManager->findAllType();

        return $this->twig->render('Admin/addCategory.html.twig', [
            'errors' => $errors,
            'categories' => $categories,
            'types' => $types,
        ]);
    }

    public function deleteCategoryAction()
    {
        if (!empty($_POST['id'])) {
            $CategoryManager = new CategoryManager();
            $category = $CategoryManager->findOneCategory($_POST['id']);
            $CategoryManager->deleteCategory($category);
            header('Location: admin.php?route=addCategory');
        }
        return $this->twig->render('Admin/addCategory.html.twig');
    }

    public function addFoodAction()
    {
        // récupérer $_POST et traiter
        $errors = [];

        // creation d'un objet food vide
        $crepe = new Food();

        if (!empty($_POST)) {

            // traitement des erreurs éventuelles
            $crepe = $this->addOrUpdateAction($crepe);
            $errors = $this->checkError();

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {

                $foodManager = new FoodManager();
                $foodManager->insertFood($crepe);

                header('Location: admin.php?route=menuAdmin');
            }
        }

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();

        return $this->twig->render('Admin/addFood.html.twig', [
            'errors' => $errors,
            'categories' => $categories,
            'crepe' => $crepe,
        ]);
    }

    public function updateFoodAction()
    {
        // récupérer $_POST et traiter
        $errors = [];

        // creation d'un objet food vide
        $foodManager = new FoodManager();

        if (!empty($_POST)) {
            // traitement des erreurs éventuelles
            $food = $foodManager->findOneFood($_POST['id']);
            $food = $this->addOrUpdateAction($food);
            $errors = $this->checkError();

            // si pas d'erreur, insert en bdd
            if (empty($errors)) {

                $foodManager = new FoodManager();

                $foodManager->updateFood($food);

                header('Location: admin.php?route=menuAdmin');

            }
        }else {
            $food = $foodManager->findOneFood($_GET['id']);
        }
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();

        return $this->twig->render('Admin/addFood.html.twig', [
            'errors' => $errors,
            'categories' => $categories,
            'crepe' => $food,
        ]);
    }

    public function deletePictureAction()
    {
        $uploadInfo = '';

        // Vérification si demande de delete
        if (!empty($_POST['delete'])) {

            // Récup id via form
            $id = (int)$_POST['delete'];

            // appel Class
            $upload = new CompanyPictureManager();

            // Vérification de la présence du fichier
            $name = $upload->findOne($id);
            if (file_exists('pictures/upload/' . $name->getName())) {

                // Delete
                $upload->deleteById($id);
                unlink('pictures/upload/' . $name->getName());

                // Message d'informations
                $uploadInfo = 'Suppression de l\'image réussie';

            } else {
                // Message d'informations
                $uploadInfo = 'L\'image n\' pas été supprimée à car elle n\'existe pas';
            }
        }

        // Récupération de la liste des images
        $companyPictureManager = new CompanyPictureManager();
        $listPictures = $companyPictureManager->findAll();

        return $this->twig->render('Admin/deletePicture.html.twig', [
            'uploadInfo' => $uploadInfo,
            'listPictures' => $listPictures,
        ]);
    }

    public function addPictureAction()
    {
        // Initialise
        $info = '';
        $companyPictureManager = new CompanyPictureManager();

        // Maximum 4 images
        if ($companyPictureManager->countAll() >= self::LimitPicture) {
            $info = 'Vous ne pouvez mettre que ' . self::LimitPicture . ' photos sur la carte';
        }

        if (!empty($_FILES['upload']) && $info == '') {

            // Nettoyage du name
            $_FILES['upload']['name'] = uniqid() . $_FILES['upload']['name'];

            // Vérification du type
            $extensions_valids = array('jpg', 'jpeg', 'gif', 'png');
            $extension_upload = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);

            if (!in_array($extension_upload, $extensions_valids)) {
                $info = 'le fichier n\'est pas du bon format';

                // Vérification de la taille
            } elseif ($_FILES['upload']['size'] >= self::MaxSize) {
                $info = 'la taille de l\'image est trop lourde';

                // Tout est bon
            } else {

                // Insert fichier upload
                move_uploaded_file($_FILES['upload']['tmp_name'], 'pictures/upload/' . $_FILES['upload']['name']);

                // Insert Bdd via Model
                $companyPictureManager->addOne($_FILES['upload']['name']);

                // Message
                $info = 'L\'image a bien été ajoutée';
            }
        }

        return $this->twig->render('Admin/addPicture.html.twig', [
            'error' => $info,
        ]);
    }

    public function updateTextAction(){

        // Initialisation
        $info = '';
        $textManager = new CompanyTextManager();

        if (!empty($_POST)){

            // Correction summernote vide
            if ($_POST['event'] == '<p><br></p>') {
                $_POST['event'] = '';
            }

            $update = new CompanyText();
            $update->setHeader($_POST['header']);
            $update->setSubHeader($_POST['subHeader']);
            $update->setEvent($_POST['event']);
            $update->setAboutUs($_POST['aboutUs']);
            $update->setTelephone($_POST['telephone']);
            $textManager->updateText($update);
            $info = 'La modification a bien été pris en compte.';
        }

        // Récupérer les textes
        $texts = $textManager->findAll();

        return $this->twig->render('Admin/updateText.html.twig', [
            'texts' => $texts,
            'info' => $info,
        ]);
    }
}
