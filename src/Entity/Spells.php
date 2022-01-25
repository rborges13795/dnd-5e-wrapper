<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\SpellsFactory;

class Spells
{
    private string $uri = 'https://www.dnd5eapi.co/api/spells/';
    private array $description;
    private ?array $higherLevel = null;
    private string $range;
    private array $components;
    private ?string $material = null;
    private bool $ritual;
    private string $duration;
    private bool $concentration;
    private string $castingTime;
    private int $level;
    private string $attackType;
    private array $damage;
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
        $class = $this->factory;
        return $class->create($this->repository->get(strtolower($index)));
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
    
    public function getHigherLevel()
    {
        return $this->higherLevel;
    }
    
    public function setHigherLevel($higherLevel)
    {
        $this->higherLevel = $higherLevel;
        return $this;
    }
    
    public function getRange()
    {
        return $this->range;
    }
    
    public function setRange($range)
    {
        $this->range = $range;
        return $this;
    }
    
    public function getComponents()
    {
        return $this->components;
    }
    
    public function setComponents($components)
    {
        $this->components = $components;
        return $this;
    }
    
    public function getMaterial()
    {
        return $this->material;
    }
    
    public function setMaterial($material)
    {
        $this->material = $material;
        return $this;
    }
    
    public function getRitual()
    {
        return $this->ritual;
    }
    
    public function setRitual($ritual)
    {
        $this->ritual = $ritual;
        return $this;
    }
    
    public function getDuration()
    {
        return $this->duration;
    }
    
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }
    
    public function getConcentration()
    {
        return $this->concentration;
    }
    
    public function setConcentration($concentration)
    {
        $this->concentration = $concentration;
        return $this;
    }
    
    public function getCastingTime()
    {
        return $this->castingTime;
    }
    
    public function setCastingTime($castingTime)
    {
        $this->castingTime = $castingTime;
        return $this;
    }
    
    public function getLevel()
    {
        return $this->level;
    }
    
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }
    
    public function getAttackType()
    {
        return $this->attackType;
    }
    
    public function setAttackType($attackType)
    {
        $this->attackType = $attackType;
        return $this;
    }
    
    public function getDamage()
    {
        return $this->damage;
    }
    
    public function setDamage($damage)
    {
        $this->damage = $damage;
        return $this;
    }
    
    public function getSchool()
    {
        return $this->school;
    }
    
    public function setSchool($school)
    {
        $this->school = $school;
        return $this;
    }
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
    
}

