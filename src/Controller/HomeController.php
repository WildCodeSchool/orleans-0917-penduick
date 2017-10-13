<?php

namespace AuPenDuick\Controller;

class HomeController extends Controller
{
    public function homeAction()
    {
        return $this->twig->render('home.html.twig');
    }
}