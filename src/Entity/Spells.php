<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\SpellsFactory;

class Spells
{

    private string $uri = 'https://www.dnd5eapi.co/api/spells/';

    private array $description;

    private array $higherLevel = [];

    private string $range;

    private array $components = [];

    private string $material = "";

    private bool $ritual = false;

    private string $duration;

    private bool $concentration = false;

    private string $castingTime;

    private string $level;
    
    private array $healAtSlotLevel = [];

    private string $attackType = "";

    private array $damage;
    
    private array $dc = [];

    private array $school;

    private SpellsFactory $factory;

    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new SpellsFactory();
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

    public function getHigherLevel(): array
    {
        return $this->higherLevel;
    }

    public function setHigherLevel($higherLevel)
    {
        $this->higherLevel = $higherLevel;
        return $this;
    }

    public function getRange(): string
    {
        return $this->range;
    }

    public function setRange($range)
    {
        $this->range = $range;
        return $this;
    }

    public function getComponents(): array
    {
        return $this->components;
    }

    public function setComponents($components)
    {
        $this->components = $components;
        return $this;
    }

    public function getMaterial(): string
    {
        return $this->material;
    }

    public function setMaterial($material)
    {
        $this->material = $material;
        return $this;
    }

    public function getRitual(): bool
    {
        return $this->ritual;
    }

    public function setRitual($ritual)
    {
        $this->ritual = $ritual;
        return $this;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    public function getConcentration(): bool
    {
        return $this->concentration;
    }

    public function setConcentration($concentration)
    {
        $this->concentration = $concentration;
        return $this;
    }

    public function getCastingTime(): string
    {
        return $this->castingTime;
    }

    public function setCastingTime($castingTime)
    {
        $this->castingTime = $castingTime;
        return $this;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }
    
    public function getHealSlotLevel(): array
    {
        return $this->healAtSlotLevel;
    }
    
    public function setHealSlotLevel($healLevel)
    {
        $this->healAtSlotLevel = $healLevel;
        return $this;
    }

    public function getAttackType(): string
    {
        return $this->attackType;
    }

    public function setAttackType($attackType)
    {
        $this->attackType = $attackType;
        return $this;
    }

    public function getDamage(): array
    {
        return $this->damage;
    }

    public function setDamage($damage)
    {
        $this->damage = $damage;
        return $this;
    }
    
    public function getDc(): array
    {
        return $this->dc;
    }
    
    public function setDc($dc)
    {
        $this->dc = $dc;
        return $this;
    }

    public function getSchool(): array
    {
        return $this->school;
    }

    public function setSchool($school)
    {
        $this->school = $school;
        return $this;
    }

}

