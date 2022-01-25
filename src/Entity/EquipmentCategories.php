<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\EquipmentCategoriesFactory;

class EquipmentCategories
{
    private string $uri = 'https://www.dnd5eapi.co/api/equipment-categories/';
    private string $index;
    private array $equipment;
    private EquipmentCategoriesFactory $factory;
    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;
    
    public function __construct() {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new EquipmentCategoriesFactory();
    }
    
    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->repository->get(strtolower($index)));
    }
    
    public function getEquipment()
    {
        return $this->equipment;
    }
    
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
        return $this;
    }
    
}
