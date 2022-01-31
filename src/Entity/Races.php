<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\RacesFactory;

class Races
{

    private string $uri = 'https://www.dnd5eapi.co/api/races/';

    private string $speed;

    private array $abilityBonuses;

    private array $abilityBonusOptions = [];

    private string $alignment;

    private string $age;

    private string $size;

    private string $sizeDescription;

    private array $startingProficiencies = [];

    private array $startingProficienciesOptions = [];

    private array $languages;

    private array $languageOptions = [];

    private string $languageDescription;

    private array $trait;

    private array $subraces = [];

    private RacesFactory $factory;

    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new RacesFactory();
    }

    public function __call($index, $args)
    {
        $entityFactory = $this->factory;
        return $entityFactory->create($this->repository->get(strtolower($index)));
    }

    public function getSpeed(): string
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }

    public function getAbilityBonuses(): array
    {
        return $this->abilityBonuses;
    }

    public function setAbilityBonuses($abilityBonuses)
    {
        $this->abilityBonuses = $abilityBonuses;
        return $this;
    }

    public function getAbilityBonusOptions(): array
    {
        return $this->abilityBonusOptions;
    }

    public function setAbilityBonusOptions($abilityBonusOptions)
    {
        $this->abilityBonusOptions = $abilityBonusOptions;
        return $this;
    }

    public function getAlignment(): string
    {
        return $this->alignment;
    }

    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;
        return $this;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function getSizeDescription(): string
    {
        return $this->sizeDescription;
    }

    public function setSizeDescription($sizeDescription)
    {
        $this->sizeDescription = $sizeDescription;
        return $this;
    }

    public function getStartingProficiencies(): array
    {
        return $this->startingProficiencies;
    }

    public function setStartingProficiencies($startingProficiencies)
    {
        $this->startingProficiencies = $startingProficiencies;
        return $this;
    }

    public function getStartingProficiencyOptions(): array
    {
        return $this->startingProficienciesOptions;
    }

    public function setStartingProficiencyOptions($startingProficienciesOptions)
    {
        $this->startingProficienciesOptions = $startingProficienciesOptions;
        return $this;
    }

    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function setLanguages($languages)
    {
        $this->languages = $languages;
        return $this;
    }

    public function getLanguageOptions(): array
    {
        return $this->languageOptions;
    }

    public function setLanguageOptions($languageOptions)
    {
        $this->languageOptions = $languageOptions;
        return $this;
    }

    public function getLanguageDescription(): string
    {
        return $this->languageDescription;
    }

    public function setLanguageDescription($languageDescription)
    {
        $this->languageDescription = $languageDescription;
        return $this;
    }

    public function getTraits(): array
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
        return $newTrait;
    }

    public function getSimpleTraits(): array
    {
        return $this->trait;
    }

    public function setTraits($trait)
    {
        $this->trait = $trait;
        return $this;
    }

    public function getSubraces(): array
    {
        return $this->subraces;
    }

    public function setSubraces($subraces)
    {
        $this->subraces = $subraces;
        return $this;
    }

}
