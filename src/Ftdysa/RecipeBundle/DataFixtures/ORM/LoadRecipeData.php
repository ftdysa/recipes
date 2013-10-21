<?php

namespace Ftdysa\RecipeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ftdysa\RecipeBundle\Entity\Recipe;

class LoadRecipeData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $om) {
        $recipe = new Recipe();
        $recipe->setName("Fred's Famous Chili");
        $recipe->setPrepTime(15);
        $recipe->setCookTime(120);
        $recipe->setServingSize(8);

        $om->persist($recipe);
        $om->flush();

        $this->addReference('recipe', $recipe);
    }

    /**
     * @{inheritDoc}
     */
    public function getOrder() {
        return 1;
    }
}