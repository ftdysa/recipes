<?php

namespace Ftdysa\RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller {

    public function indexAction() {
        return $this->render('FtdysaRecipeBundle:main:index.html.twig');
    }
}