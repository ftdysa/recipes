<?php

namespace Ftdysa\RecipeBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Ftdysa\RecipeBundle\Entity\UnitOfMeasurement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class IngredientType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('description', 'text');
        $builder->add('amount', 'number');
        $builder->add('unit', 'entity', array(
            'class' => 'FtdysaRecipeBundle:UnitOfMeasurement',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('uom');
            }
        ));
    }

    public function getName() {
        return 'recipes_ingredient';
    }
}