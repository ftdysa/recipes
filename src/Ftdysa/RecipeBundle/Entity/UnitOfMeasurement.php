<?php

namespace Ftdysa\RecipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class UnitOfMeasurement
 * @package Ftdysa\RecipeBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="unit_of_measurement")
 */
class UnitOfMeasurement {
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;

        return $this;
    }
}