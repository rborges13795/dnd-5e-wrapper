<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\RacesFactory;

class Races extends Dnd5eRepository
{
    protected string $uri = 'https://www.dnd5eapi.co/api/races/';

    private string $speed;

    private array $abilityBonuses;

    private array $abilityBonusOptions;

    private string $alignment;

    private string $age;

    private string $size;

    private string $sizeDescription;

    private array $startingProficiencies;

    private ?array $startingProficienciesOptions = null;

    private array $languages;

    private ?array $languageOptions = null;

    private string $languageDescription;

    private array $trait;

    private array $subraces;

    protected RacesFactory $factory;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->uri
        ]);
        $this->factory = new RacesFactory();
    }

    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->get(strtolower($index)));
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
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

    public function getAbilityBonusOptions()
    {
        return $this->abilityBonusOptions;
    }

    public function setAbilityBonusOptions($abilityBonusOptions)
    {
        $this->abilityBonusOptions = $abilityBonusOptions;
        return $this;
    }

    public function getAlignment()
    {
        return $this->alignment;
    }

    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;
        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function getSizeDescription()
    {
        return $this->sizeDescription;
    }

    public function setSizeDescription($sizeDescription)
    {
        $this->sizeDescription = $sizeDescription;
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

    public function getStartingProficiencyOptions()
    {
        return $this->startingProficienciesOptions;
    }

    public function setStartingProficiencyOptions($startingProficienciesOptions)
    {
        $this->startingProficienciesOptions = $startingProficienciesOptions;
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

    public function getLanguageDescription()
    {
        return $this->languageDescription;
    }

    public function setLanguageDescription($languageDescription)
    {
        $this->languageDescription = $languageDescription;
        return $this;
    }

    public function getTraits()
    {
        $oldTrait = $this->trait;
        $traitClass = new Traits();
        $newTrait = [];
        foreach ($oldTrait as $value) {
            $traitIndex = $value['index'];
            $addTrait = $traitClass->$traitIndex();
            $value['description'] = $addTrait->getDescription();
            $newTrait[] = $value;
        }
        
        $this->trait = $newTrait;
    }
    
    public function getSimpleTraits()
    {
        return $this->trait;
    }

    public function setTraits($trait)
    {
        $this->trait = $trait;
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

    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }
}
