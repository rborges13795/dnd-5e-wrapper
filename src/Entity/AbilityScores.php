<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\AbilityScoresFactory;

class AbilityScores
{
    private string $uri = 'https://www.dnd5eapi.co/api/ability-scores/';
    private string $fullName;
    private array $description;
    private array $skills;
    private AbilityScoresFactory $factory;
    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new AbilityScoresFactory();
    }

    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->repository->get(strtolower($index)));
    }
    
    public function getFullName()
    {
        return $this->fullName;
    }
    
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }
    
}

