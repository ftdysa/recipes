<?php

namespace Ftdysa\RecipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ftdysa\RecipeBundle\Entity\Recipe;
use Ftdysa\RecipeBundle\Entity\UnitOfMeasurement;

/**
 * Class Ingredient
 * @package Ftdysa\RecipeBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="ingredient")
 */
class Ingredient {

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

    /**
     * @ORM\ManyToOne(targetEntity="Recipe", inversedBy="ingredient")
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     */
    protected $recipe;

    /**
     * @ORM\Column(name="amount", type="integer")
     */
    protected $amount;

    /**
     * @ORM\ManyToOne(targetEntity="UnitOfMeasurement")
     * @ORM\JoinColumn(name="unit_id", referencedColumnName="id")
     */
    protected $unit;

    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    protected $description;

    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setRecipe(Recipe $recipe) {
        $this->recipe = $recipe;

        return $this;
    }

    public function getRecipe() {
        return $this->recipe;
    }

    public function setUnit(UnitOfMeasurement $unit) {
        $this->unit = $unit;

        return $this;
    }

    public function setDescription($desc) {
        $this->description = $desc;

        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

}