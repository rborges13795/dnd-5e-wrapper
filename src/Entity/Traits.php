<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\TraitsFactory;

class Traits
{

    private string $uri = 'https://www.dnd5eapi.co/api/traits/';

    private array $races;

    private array $subraces;

    private array $description;

    private array $proficiencies;

    private TraitsFactory $factory;

    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new TraitsFactory();
    }

    public function __call($index, $args)
    {
        $entityFactory = $this->factory;
        return $entityFactory->create($this->repository->get(strtolower($index)));
    }

    public function getRaces(): array
    {
        return $this->races;
    }

    public function setRaces($races)
    {
        $this->races = $races;
        return $this;
    }

    public function getSubraces(): array
    {
        return $this->subraces;
    }

    public function setSubraces($subraces)
    {
        $this->subraces = $subraces;
        return $this;
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

    public function getProficiencies(): array
    {
        return $this->proficiencies;
    }

    public function setProficiencies($proficiencies)
    {
        $this->proficiencies = $proficiencies;
        return $this;
    }

}

