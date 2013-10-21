<?php

namespace Ftdysa\RecipeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Recipe
 * @package Ftdysa\RecipeBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="recipe")
 */
class Recipe {

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
     * @ORM\Column(name="prep_time", type="integer")
     */
    protected $prepTime;

    /**
     * @ORM\Column(name="cook_time", type="integer")
     */
    protected $cookTime;

    /**
     * @ORM\Column(name="serving_size", type="integer")
     */
    protected $servingSize;

    /**
     * @ORM\OneToMany(targetEntity="RecipeDirection", mappedBy="recipe")
     */
    protected $directions;

    public function __construct() {
        $this->directions = new ArrayCollection();
    }

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

    public function getCookTime() {
        return $this->cookTime;
    }

    public function setCookTime($cookTime) {
        $this->cookTime = $cookTime;

        return $this;
    }

    public function getPrepTime() {
        return $this->prepTime;
    }

    public function setPrepTime($prepTime) {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getServingSize() {
        return $this->servingSize;
    }

    public function setServingSize($servingSize) {
        $this->servingSize = $servingSize;

        return $this;
    }

    public function getDirections() {
        return $this->directions;
    }
}