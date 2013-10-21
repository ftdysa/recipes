<?php

namespace Ftdysa\RecipeBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RecipeDirectionType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('description', 'text');
    }

    public function getName() {
        return 'recipes_recipe_direction';
    }
}