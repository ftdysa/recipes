<?php

namespace Ftdysa\RecipeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ftdysa\RecipeBundle\Entity\Ingredient;
use Ftdysa\RecipeBundle\Entity\UnitOfMeasurement;

class LoadRecipeIngredientData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $om) {
        $ingredients = array(
            array(
                'description' => '80/20 ground beef',
                'amount' => 1,
                'unit' => $this->getReference('cup'),
            ),
            array(
                'description' => 'chili powder',
                'amount' => 3,
                'unit' => $this->getReference('tablespoon'),
            ),
            array(
                'description' => 'good dark beer',
                'amount' => 1,
                'unit' => null,
            )
        );

        foreach ($ingredients as $i) {
            $ing = new Ingredient();
            $ing->setRecipe($this->getReference('recipe'));
            $ing->setDescription($i['description']);
            $ing->setAmount($i['amount']);
            if ($i['unit'] !== null) $ing->setUnit($i['unit']);

            $om->persist($ing);
        }

        $om->flush();
    }

    /**
     * @{inheritDoc}
     */
    public function getOrder() {
        return 4;
    }
}