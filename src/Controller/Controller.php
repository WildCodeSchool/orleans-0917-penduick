<?php

namespace AuPenDuick\Controller;

/**
 * Class Controller
 * @package AuPenDuick\Controller
 */
class Controller
{
    protected $twig;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../View');
        $this->twig = new \Twig_Environment($loader, array(
            'cache' => false,
        ));
    }
}