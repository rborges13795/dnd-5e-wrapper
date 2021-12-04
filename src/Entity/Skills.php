<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\SkillsFactory;

class Skills extends Dnd5eRepository
{
    protected string $uri = 'https://www.dnd5eapi.co/api/skills/';
    private string $index;
    private array $description;
    private array $abilityScore;
    protected SkillsFactory $factory;
    
    public function __construct() {
        $this->client = new Client(['base_uri' => $this->uri]);
        $this->factory = new SkillsFactory();
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
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    
    public function getAbilityScore()
    {
        return $this->abilityScore;
    }
    
    public function setAbilityScore($abilityScore)
    {
        $this->abilityScore = $abilityScore;
        return $this;
    }
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
    
}

