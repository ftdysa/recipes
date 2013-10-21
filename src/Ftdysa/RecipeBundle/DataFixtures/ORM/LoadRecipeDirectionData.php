<?php

namespace Ftdysa\RecipeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ftdysa\RecipeBundle\Entity\RecipeDirection;

class LoadRecipeDirectionData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $om) {
        $directions = array(
            array(
                'listNum' => 1,
                'description' => 'First do this.',
            ),
            array(
                'listNum' => 2,
                'description' => "Then do this."
            )
        );

        foreach ($directions as $dir) {
            $direction = new RecipeDirection();
            $direction->setDescription($dir['description']);
            $direction->setListNum($dir['listNum']);
            $direction->setRecipe($this->getReference('recipe'));

            $om->persist($direction);
        }

        $om->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 2;
    }
}