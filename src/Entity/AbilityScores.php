<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\AbilityScoresFactory;

class AbilityScores extends Dnd5eRepository
{

    protected string $uri = 'https://www.dnd5eapi.co/api/ability-scores/';
    private string $index;
    private string $fullName;
    private array $description;
    private array $skills;
    protected AbilityScoresFactory $factory;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->uri
        ]);
        
        $this->factory = new AbilityScoresFactory();
    }

    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->get(strtolower($index)));
    }
    
    public function all(): array
    {
        return strtoupper($this->all());
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
    
    public function getFullName()
    {
        return $this->fullName;
    }
    
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
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

    public function getSkills()
    {
        return $this->skills;
    }

    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
}

