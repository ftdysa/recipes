<?php

namespace Ftdysa\RecipeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Ftdysa\RecipeBundle\Form\Type\IngredientType;
use Ftdysa\RecipeBundle\Form\Type\RecipeDirectionType;

class RecipeType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text');
        $builder->add('prepTime', 'number');
        $builder->add('cookTime', 'number');
        $builder->add('servingSize', 'number');

        $builder->add('ingredients', 'collection', array(
            'type' => new IngredientType(),
            'allow_add' => true,
            'by_reference' => false
        ));

        $builder->add('directions', 'collection', array(
            'type' => new RecipeDirectionType(),
            'allow_add' => true,
            'by_reference' => false
        ));
    }

    public function getName() {
        return 'recipes_recipe';
    }
}