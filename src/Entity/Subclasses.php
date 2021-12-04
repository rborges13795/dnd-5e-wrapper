<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use App\Repository\Dnd5eRepository;
use App\Factory\SubclassesFactory;

class Subclasses extends Dnd5eRepository
{
    protected string $uri = 'https://www.dnd5eapi.co/api/subclasses/';
    private string $index;
    private array $class;
    private string $subclassFlavor;
    private array $description;
    private string $subclassLevels;
    protected SubclassesFactory $factory;
    
    public function __construct() {
        $this->client = new Client(['base_uri' => $this->uri]);
        $this->factory = new SubclassesFactory();
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
    
    public function getClass()
    {
        return $this->class;
    }
    
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }
    
    public function getSubclassFlavor()
    {
        return $this->subclassFlavor;
    }
    
    public function setSubclassFlavor($subclassFlavor)
    {
        $this->subclassFlavor = $subclassFlavor;
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
    
    public function getSubclassLevels()
    {
        return $this->subclassLevels;
    }
    
    public function setSubclassLevels($subclassLevels)
    {
        $this->subclassLevels = $subclassLevels;
        return $this;
    }
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
    
}
