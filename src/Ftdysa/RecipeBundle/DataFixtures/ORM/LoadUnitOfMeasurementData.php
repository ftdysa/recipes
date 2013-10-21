<?php

namespace Ftdysa\RecipeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ftdysa\RecipeBundle\Entity\UnitOfMeasurement;

class LoadUnitOfMeasurementData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $om) {
        $units = array(
            'cup',
            'teaspoon',
            'tablespoon',
            'pint',
            'quart',
            'pound',
            'gallon',
            'oz',
            'fluid oz',
            'gram',
            'liter',
            'ml',
        );

        foreach ($units as $unit) {
            $uom = new UnitOfMeasurement();
            $uom->setName($unit);

            $om->persist($uom);
            $this->addReference($unit, $uom);
        }

        $om->flush();
    }

    /**
     * @{inheritDoc}
     */
    public function getOrder() {
        return 3;
    }
}