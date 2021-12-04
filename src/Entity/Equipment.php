<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\EquipmentFactory;
/*
 * DIVIDE ARMOR AND WEAPON
 */
class Equipment extends Dnd5eRepository
{
    protected string $uri = 'https://www.dnd5eapi.co/api/equipment/';
    private string $index;
    private array $equipmentCategory;
    private array $gearCategory;
    private string $armorCategory;
    private string $weaponCategory;
    private string $weaponRange;
    private string $categoryRange;
    private array $damage;
    private array $range;
    private array $properties;
    private array $throwRange;
    private array $armorClass;
    private int $strMinimun;
    private bool $stealthDisadvantage;
    private array $cost;
    private int $weight;
    protected EquipmentFactory $factory; 
    
    public function __construct() {
        $this->client = new Client(['base_uri' => $this->uri]);
        $this->factory = new EquipmentFactory();
    }
    
    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->get(strtolower($index)));
    }
    
    public function getIndex()
    {
        return $this->index;
    }
    
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }
    
    public function getEquipmentCategory()
    {
        return $this->equipmentCategory;
    }
    
    public function setEquipmentCategory($equipmentCategory)
    {
        $this->equipmentCategory = $equipmentCategory;
        return $this;
    }
    
    public function getArmorCategory()
    {
        return $this->armorCategory;
    }
    
    public function setArmorCategory($armorCategory)
    {
        $this->armorCategory = $armorCategory;
        return $this;
    }
    
    public function getWeaponCategory()
    {
        return $this->weaponCategory;
    }
    
    public function setWeaponCategory($weaponCategory)
    {
        $this->weaponCategory = $weaponCategory;
        return $this;
    }
    
    public function getWeaponRange()
    {
        return $this->weaponRange;
    }
    
    public function setWeaponRange($weaponRange)
    {
        $this->weaponRange = $weaponRange;
        return $this;
    }
    
    public function getCategoryRange()
    {
        return $this->categoryRange;
    }
    
    public function setCategoryRange($categoryRange)
    {
        $this->categoryRange = $categoryRange;
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
    
    public function getRange()
    {
        return $this->range;
    }
    
    public function setRange($range)
    {
        $this->range = $range;
        return $this;
    }
    
    public function getProperties()
    {
        return $this->properties;
    }
    
    public function setProperties($properties)
    {
        $this->properties = $properties;
        return $this;
    }
    
    public function getThrowRange()
    {
        return $this->throwRange;
    }
    
    public function setThrowRange($throwRange)
    {
        $this->throwRange = $throwRange;
        return $this;
    }
    
    public function getArmorClass()
    {
        return $this->armorClass;
    }
    
    public function setArmorClass($armorClass)
    {
        $this->armorClass = $armorClass;
        return $this;
    }
    
    public function getStrMinimun()
    {
        return $this->strMinimun;
    }
    
    public function setStrMinimun($strMinimun)
    {
        $this->strMinimun = $strMinimun;
        return $this;
    }
    
    public function getStealthDisadvantage()
    {
        return $this->stealthDisadvantage;
    }
    
    public function setStealthDisadvantage($stealthDisadvantage)
    {
        $this->stealthDisadvantage = $stealthDisadvantage;
        return $this;
    }
    
    public function getGearCategory()
    {
        return $this->gearCategory;
    }
    
    public function setGearCategory($gearCategory)
    {
        $this->gearCategory = $gearCategory;
        return $this;
    }
    
    public function getCost()
    {
        return $this->cost;
    }
    
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }
    
    public function getWeight()
    {
        return $this->weight;
    }
    
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
    
}
