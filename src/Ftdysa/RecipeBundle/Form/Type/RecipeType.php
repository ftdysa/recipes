<?php

namespace Ftdysa\RecipeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RecipeType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text');
        $builder->add('prepTime', 'number');
        $builder->add('cookTime', 'number');
        $builder->add('servingSize', 'number');

    }

    public function getName() {
        return 'recipes_recipe';
    }
}