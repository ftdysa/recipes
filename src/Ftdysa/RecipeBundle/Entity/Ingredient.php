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
     * @ORM\Column(name="description", type="string", length=255)
     */
    protected $description;


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
     * @ORM\JoinColumn(name="unit_id", referencedColumnName="id", nullable=true)
     */
    protected $unit;

    public function getId() {
        return $this->id;
    }

    public function setDescription($desc) {
        $this->description = $desc;

        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setRecipe(Recipe $recipe) {
        $this->recipe = $recipe;

        return $this;
    }

    public function getRecipe() {
        return $this->recipe;
    }

    public function setAmount($amt) {
        $this->amount = $amt;

        return $this;
    }

    public function getAmount() {
        return $this;
    }

    public function setUnit(UnitOfMeasurement $unit) {
        $this->unit = $unit;

        return $this;
    }

    public function getUnit() {
        return $this->unit;
    }
}