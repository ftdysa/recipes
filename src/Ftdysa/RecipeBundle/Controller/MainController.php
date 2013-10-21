<?php

namespace Ftdysa\RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller {

    public function indexAction() {
        $recipes = $this->getDoctrine()->getRepository('FtdysaRecipeBundle:Recipe')->findAll();

        return $this->render('FtdysaRecipeBundle:Main:index.html.twig', [ 'recipes' => $recipes ]);
    }
}