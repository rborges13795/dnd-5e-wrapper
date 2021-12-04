<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use GuzzleHttp\Client;
use Dnd5eApi\Factory\ProficienciesFactory;

class Proficiencies extends Dnd5eRepository
{

    protected string $uri = 'https://www.dnd5eapi.co/api/proficiencies/';

    private string $index;

    private string $type;

    private array $classes;

    private array $races;

    protected ProficienciesFactory $factory;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->uri
        ]);
        $this->factory = new ProficienciesFactory();
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
