<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\EquipmentFactory;

/*
 * DIVIDE ARMOR AND WEAPON
 */
class Equipment
{

    private string $uri = 'https://www.dnd5eapi.co/api/equipment/';

    private string $index;

    private array $equipmentCategory = [];

    private array $gearCategory = [];

    private string $armorCategory = "";

    private string $weaponCategory = "";

    private string $weaponRange = "";

    private string $categoryRange = "";
    
    private string $toolCategory = "";

    private array $damage = [];

    private array $range = [];

    private array $properties = [];

    private array $throwRange = [];

    private array $armorClass = [];

    private int $strMinimun = 0;

    private bool $stealthDisadvantage = FALSE;

    private array $cost = [];

    private int $weight = 0;

    private EquipmentFactory $factory;

    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new EquipmentFactory();
    }

    public function __call($index, $args)
    {
        $entityFactory = $this->factory;
        return $entityFactory->create($this->repository->get(strtolower($index)));
    }

    public function getEquipmentCategory(): array
    {
        return $this->equipmentCategory;
    }

    public function setEquipmentCategory($equipmentCategory)
    {
        $this->equipmentCategory = $equipmentCategory;
        return $this;
    }

    public function getArmorCategory(): string
    {
        return $this->armorCategory;
    }

    public function setArmorCategory($armorCategory)
    {
        $this->armorCategory = $armorCategory;
        return $this;
    }

    public function getWeaponCategory(): string
    {
        return $this->weaponCategory;
    }

    public function setWeaponCategory($weaponCategory)
    {
        $this->weaponCategory = $weaponCategory;
        return $this;
    }

    public function getWeaponRange(): string
    {
        return $this->weaponRange;
    }

    public function setWeaponRange($weaponRange)
    {
        $this->weaponRange = $weaponRange;
        return $this;
    }

    public function getCategoryRange(): string
    {
        return $this->categoryRange;
    }

    public function setCategoryRange($categoryRange)
    {
        $this->categoryRange = $categoryRange;
        return $this;
    }
    
    public function getToolCategory(): string
    {
        return $this->toolCategory;
    }
    
    public function setToolCategory($toolCategory)
    {
        $this->toolCategory = $toolCategory;
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

    public function getRange(): array
    {
        return $this->range;
    }

    public function setRange($range)
    {
        $this->range = $range;
        return $this;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties($properties)
    {
        $this->properties = $properties;
        return $this;
    }

    public function getThrowRange(): array
    {
        return $this->throwRange;
    }

    public function setThrowRange($throwRange)
    {
        $this->throwRange = $throwRange;
        return $this;
    }

    public function getArmorClass(): array
    {
        return $this->armorClass;
    }

    public function setArmorClass($armorClass)
    {
        $this->armorClass = $armorClass;
        return $this;
    }

    public function getStrMinimun(): int
    {
        return $this->strMinimun;
    }

    public function setStrMinimun($strMinimun)
    {
        $this->strMinimun = $strMinimun;
        return $this;
    }

    public function getStealthDisadvantage(): bool
    {
        return $this->stealthDisadvantage;
    }

    public function setStealthDisadvantage($stealthDisadvantage)
    {
        $this->stealthDisadvantage = $stealthDisadvantage;
        return $this;
    }

    public function getGearCategory(): array
    {
        return $this->gearCategory;
    }

    public function setGearCategory($gearCategory)
    {
        $this->gearCategory = $gearCategory;
        return $this;
    }

    public function getCost(): array
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }
}
