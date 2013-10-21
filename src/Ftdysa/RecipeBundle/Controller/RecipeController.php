<?php
namespace Ftdysa\RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ftdysa\RecipeBundle\Form\Type\RecipeType;

class RecipeController extends Controller {
    public function viewAction($id) {
        $recipe = $this->getDoctrine()->getRepository('FtdysaRecipeBundle:Recipe')->find($id);

        return $this->render('FtdysaRecipeBundle:Recipe:view.html.twig', [ 'recipe' => $recipe ]);
    }

    public function addAction() {
        $form = $this->createForm(new RecipeType());

        return $this->render('FtdysaRecipeBundle:Recipe:add.html.twig', [ 'form' => $form->createView() ]);
    }
}