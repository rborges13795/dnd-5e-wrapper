<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use GuzzleHttp\Client;
use Dnd5eApi\Factory\SubracesFactory;

class Subraces extends Dnd5eRepository
{
    protected string $uri = 'https://www.dnd5eapi.co/api/subraces/';
    private array $race;
    private string $description;
    private array $abilityBonuses;
    private array $startingProficiencies;
    private array $languages;
    private array $languageOptions;
    private array $racialTraits;
    protected SubracesFactory $factory;
    
    public function __construct() {
        $this->client = new Client(['base_uri' => $this->uri]);
        $this->factory = new SubracesFactory();
    }
    
    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->get(strtolower($index)));
    }
    
    public function Race()
    {
        return $this->race;
    }
    
    public function setRace($race)
    {
        $this->race = $race;
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
    
    public function getAbilityBonuses()
    {
        return $this->abilityBonuses;
    }
    
    public function setAbilityBonuses($abilityBonuses)
    {
        $this->abilityBonuses = $abilityBonuses;
        return $this;
    }
    
    public function getStartingProficiencies()
    {
        return $this->startingProficiencies;
    }
    
    public function setStartingProficiencies($startingProficiencies)
    {
        $this->startingProficiencies = $startingProficiencies;
        return $this;
    }
    
    public function getLanguages()
    {
        return $this->languages;
    }
    
    public function setLanguages($languages)
    {
        $this->languages = $languages;
        return $this;
    }
    
    public function getLanguageOptions()
    {
        return $this->languageOptions;
    }
    
    public function setLanguageOptions($languageOptions)
    {
        $this->languageOptions = $languageOptions;
        return $this;
    }
    
    public function getRacialTraits()
    {
        return $this->racialTraits;
    }
    
    public function setRacialTraits($racialTraits)
    {
        $this->racialTraits = $racialTraits;
        return $this;
    }
    
    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
    
}

