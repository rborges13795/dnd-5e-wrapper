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
        $completeSpellcasting = $this->spellcasting;
        if ($completeSpellcasting == null) {
            return $completeSpellcasting;
        }
        
        if ($this->getIndex() == 'bard') {
            $completeSpellcasting['cantripsKnown'] = 2;
            $completeSpellcasting['spellsKnown'] = 4;
            $completeSpellcasting['spellSlots'] = 2;
        }
        //spells known = cleric level + Wisdom modifier (minimum of 1)
        if ($this->getIndex() == 'cleric') {
            $completeSpellcasting['cantripsKnown'] = 3;
            $completeSpellcasting['spellsKnown'] = 1;
            $completeSpellcasting['spellSlots'] = 2;
        }
        //spells known = druid level + Wisdom modifier (minimum of 1)
        if ($this->getIndex() == 'druid') {
            $completeSpellcasting['cantripsKnown'] = 2;
            $completeSpellcasting['spellsKnown'] = 1;
            $completeSpellcasting['spellSlots'] = 2;
        }
        
        if ($this->getIndex() == 'sorcerer') {
            $completeSpellcasting['cantripsKnown'] = 4;
            $completeSpellcasting['spellsKnown'] = 2;
            $completeSpellcasting['spellSlots'] = 2;
        }
        
        if ($this->getIndex() == 'warlock') {
            $completeSpellcasting['cantripsKnown'] = 2;
            $completeSpellcasting['spellsKnown'] = 2;
            $completeSpellcasting['spellSlots'] = 1;
        }
        
        if ($this->getIndex() == 'wizard') {
            $completeSpellcasting['cantripsKnown'] = 3;
            $completeSpellcasting['spellsKnown'] = 6;
            $completeSpellcasting['spellSlots'] = 2;
        }
        
        return $completeSpellcasting;
    }
    
    public function getSimpleSpellcasting()
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
        $completeSpells = $this->spells;
        if ($completeSpells == null) {
            return $completeSpells;
        }
        $spellClass = new Spells();
        $newSpell = [];
        foreach ($completeSpells as $value) {
            $spellIndex = $value['index'];
            $addSpell = $spellClass->$spellIndex();
            if ($addSpell->getLevel() >= 2) {
                break;
            }
            $value['description'] = $addSpell->getDescription();
            $value['level'] = $addSpell->getLevel();
            $value['castingTime'] = $addSpell->getCastingTime();
            $value['duration'] = $addSpell->getDuration();
            $value['components'] = $addSpell->getComponents();
            $value['range'] = $addSpell->getRange();
            $value['concentration'] = $addSpell->getConcentration();
            $value['ritual'] = $addSpell->getRitual();
            $value['school'] = $addSpell->getSchool();
            if ($addSpell->getMaterial() !== null) {
                $value['material'] = $addSpell->getMaterial();
            }
            if ($addSpell->getHigherLevel() !== null) {
                $value['higherLevel'] = $addSpell->getHigherLevel();
            }
            $newSpell[] = $value;
        }
        return $newSpell;
    }
    
    public function getSimpleSpells()
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

