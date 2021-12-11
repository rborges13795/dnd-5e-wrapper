<?php
namespace Dnd5eApi\Entity;

use GuzzleHttp\Client;
use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\ClassesFactory;

class Classes extends Dnd5eRepository
{

    protected string $uri = 'https://www.dnd5eapi.co/api/classes/';
    private int $hitDie;
    private array $proficiencyChoices;
    private array $proficiencies;
    private array $savingThrows;
    private array $startingEquipment;
    private array $startingEquipmentOptions;
    private string $classLevels;
    private array $multiClassing;
    private array $subclasses;
    private ?array $spellcasting = null;
    private ?array $spells = null;
    public ClassesFactory $factory;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->uri
        ]);
        
        $this->factory = new ClassesFactory();
    }

    public function __call($index, $args)
    {
        $class = $this->factory;
        return $class->create($this->get(strtolower($index)));
    }
    
    public function getHitDie()
    {
        return $this->hitDie;
    }
    
    public function setHitDie($hitDie)
    {
        $this->hitDie = $hitDie;
        return $this;
    }

    public function getProficiencyChoices()
    {
        return $this->proficiencyChoices;
    }

    public function setProficiencyChoices($proficiencyChoices)
    {
        $this->proficiencyChoices = $proficiencyChoices;
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

    public function getSavingThrows()
    {
        return $this->savingThrows;
    }

    public function setSavingThrows($savingThrows)
    {
        $this->savingThrows = $savingThrows;
        return $this;
    }

    public function getStartingEquipment()
    {
        return $this->startingEquipment;
    }

    public function setStartingEquipment($startingEquipment)
    {
        $this->startingEquipment = $startingEquipment;
        return $this;
    }

    public function getStartingEquipmentOptions()
    {
        return $this->startingEquipmentOptions;
    }

    public function setStartingEquipmentOptions($startingEquipmentOptions)
    {
        $this->startingEquipmentOptions = $startingEquipmentOptions;
        return $this;
    }

    public function getClassLevels()
    {
        return $this->classLevels;
    }

    public function setClassLevels($classLevels)
    {
        $this->classLevels = $classLevels;
        return $this;
    }

    public function getMultiClassing()
    {
        return $this->multiClassing;
    }

    public function setMultiClassing($multiClassing)
    {
        $this->multiClassing = $multiClassing;
        return $this;
    }

    public function getSubclasses()
    {
        return $this->subclasses;
    }

    public function setSubclasses($subclasses)
    {
        $this->subclasses = $subclasses;
        return $this;
    }

    public function getSpellcasting()
    {
        return $this->spellcasting;
    }

    public function setSpellcasting($spellcasting)
    {
        $this->spellcasting = $spellcasting;
        return $this;
    }

    public function getSpells()
    {
        return $this->spells;
    }
    
    public function setSpells($spells)
    {
        $this->spells = $spells;
        return $this;
    }

    public function getUrl()
    {
        return $this->uri . $this->getIndex();
    }

}

