<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\ProficienciesFactory;

class Proficiencies
{

    private string $uri = 'https://www.dnd5eapi.co/api/proficiencies/';
    private string $index;
    private string $type;
    private array $classes;
    private array $races;
    private ProficienciesFactory $factory;
    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new ProficienciesFactory();
    }
    
    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->repository->get(strtolower($index)));
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getClasses()
    {
        return $this->classes;
    }

    public function setClasses($classes)
    {
        $this->classes = $classes;
        return $this;
    }

    public function getRaces()
    {
        return $this->races;
    }

    public function setRaces($races)
    {
        $this->races = $races;
        return $this;
    }

    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
}
