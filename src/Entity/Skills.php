<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\SkillsFactory;

class Skills
{

    private string $uri = 'https://www.dnd5eapi.co/api/skills/';

    private array $description;

    private array $abilityScore;

    private SkillsFactory $factory;

    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new SkillsFactory();
    }

    public function __call($index, $args)
    {
        $entityFactory = $this->factory;
        return $entityFactory->create($this->repository->get(strtolower($index)));
    }

    public function getDescription(): array
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getAbilityScore(): array
    {
        return $this->abilityScore;
    }

    public function setAbilityScore($abilityScore)
    {
        $this->abilityScore = $abilityScore;
        return $this;
    }

}

