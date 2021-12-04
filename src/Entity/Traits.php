<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\TraitsFactory;

class Traits extends Dnd5eRepository
{
    protected string $uri = 'https://www.dnd5eapi.co/api/traits/';
    private string $index;
    private array $races;
    private array $subraces;
    private array $description;
    private array $proficiencies;
    protected TraitsFactory $factory;
    
    public function __construct() {
        $this->client = new Client(['base_uri' => $this->uri]);
        $this->factory = new TraitsFactory();
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
    
    public function getRaces()
    {
        return $this->races;
    }
    
    public function setRaces($races)
    {
        $this->races = $races;
        return $this;
    }
    
    public function getSubraces()
    {
        return $this->subraces;
    }
    
    public function setSubraces($subraces)
    {
        $this->subraces = $subraces;
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
    
    public function getProficiencies()
    {
        return $this->proficiencies;
    }
    
    public function setProficiencies($proficiencies)
    {
        $this->proficiencies = $proficiencies;
        return $this;
    }
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
}

