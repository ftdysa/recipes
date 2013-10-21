<?php

namespace Ftdysa\RecipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ftdysa\RecipeBundle\Entity\Recipe;

/**
 * Class RecipeDirection
 * @package Ftdysa\RecipeBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="recipe_direction")
 */
class RecipeDirection {
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Recipe", inversedBy="ingredient")
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     */
    protected $recipe;

    /**
     * @ORM\Column(name="list_num", type="integer")
     */
    protected $listNum;

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
        return $this->receipe;
    }

    public function setListNum($listNum) {
        $this->listNum = $listNum;

        return $this;
    }

    public function getListNum() {
        return $this->listNum;
    }
}