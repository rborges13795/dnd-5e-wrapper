<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\EquipmentCategoriesFactory;

class EquipmentCategories extends Dnd5eRepository
{
    protected string $uri = 'https://www.dnd5eapi.co/api/equipment-categories/';
    private string $index;
    private array $equipment;
    protected EquipmentCategoriesFactory $factory;
    
    public function __construct() {
        $this->client = new Client(['base_uri' => $this->uri]);
        $this->factory = new EquipmentCategoriesFactory();
    }
    
    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->get(strtolower($index)));
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
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
    
}
