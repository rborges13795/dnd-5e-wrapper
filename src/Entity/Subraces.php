<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\SubracesFactory;

class Subraces
{

    private string $uri = 'https://www.dnd5eapi.co/api/subraces/';

    private array $race;

    private string $description;

    private array $abilityBonuses;

    private array $startingProficiencies;

    private array $languages = [];

    private array $languageOptions = [];

    private array $racialTraits;

    private SubracesFactory $factory;

    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new SubracesFactory();
    }

    public function __call($index, $args)
    {
        $entityFactory = $this->factory;
        return $entityFactory->create($this->repository->get(strtolower($index)));
    }

    public function getRace(): array
    {
        return $this->race;
    }

    public function setRace($race)
    {
        $this->race = $race;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
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

    public function getStartingProficiencies(): array
    {
        return $this->startingProficiencies;
    }

    public function setStartingProficiencies($startingProficiencies)
    {
        $this->startingProficiencies = $startingProficiencies;
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

    public function getRacialTraits(): array
    {
        return $this->racialTraits;
    }

    public function setRacialTraits($racialTraits)
    {
        $this->racialTraits = $racialTraits;
        return $this;
    }

}

