<?php

namespace AuPenDuick\Controller;

use AuPenDuick\Model\DisplayManager;
use AuPenDuick\Model\DisplayMenuManager;

/**
 * Class HomeController
 * @package AuPenDuick\Controller
 */
class HomeController extends Controller
{
    public function homeAction()
    {
        // Appels à DisplayManager (Model)
        $displayManager = new DisplayManager();

        // Détail de récup du display
        $displayTexts = $displayManager->findDisplayText();
        $displayPictureName = $displayManager->findDisplayPictureName();
        $displayPictureLocalSrc = $displayManager->findDisplayPictureLocalSrc();

        // appel de la vue
        return $this->twig->render('home.html.twig', [
            'displayTexts' => $displayTexts,
            'displayPictures' => $displayPictureName,
            'displayPicturesLocalSrc' => $displayPictureLocalSrc,
        ]);
    }

    public function menuContentAction()
    {
        // Appels à DisplayManager (Model)
        $displayManager = new DisplayManager();
        $displayMenuManager = new DisplayMenuManager();

        // Détail de récup du display
        $displayTexts = $displayManager->findDisplayText();
        $displayPictureName = $displayManager->findDisplayPictureName();
        $displayPictureLocalSrc = $displayManager->findDisplayPictureLocalSrc();
        $displayDescription = $displayMenuManager->findDisplayDescription();
        $displayCategory = $displayMenuManager->findDisplayCategory();
        $displayPrice = $displayMenuManager->findDisplayPrice();

        // appel de la vue
        return $this->twig->render('menucontent.html.twig', [
            'displayTexts' => $displayTexts,
            'displayPictures' => $displayPictureName,
            'displayPicturesLocalSrc' => $displayPictureLocalSrc,
            'displayDescription' => $displayDescription,
            'displayCategory' => $displayCategory,
            'displayPrice' => $displayPrice,
        ]);
    }
}