<?php
namespace Dnd5eApi\Entity;

use Dnd5eApi\Repository\Dnd5eRepository;
use Dnd5eApi\Factory\ClassesFactory;

class Classes
{

    private string $uri = 'https://www.dnd5eapi.co/api/classes/';

    private string $hitDie;

    private array $proficiencyChoices;

    private array $proficiencies;

    private array $savingThrows;

    private array $startingEquipment;

    private array $startingEquipmentOptions;

    private string $classLevels;

    private array $multiClassing;

    private array $subclasses;

    private array $spellcasting = [];

    private array $spells = [];

    private ClassesFactory $factory;

    private Dnd5eRepository $repository;
    use GetNameIndexAndUrlTrait;

    public function __construct()
    {
        $this->repository = new Dnd5eRepository($this->uri);
        $this->factory = new ClassesFactory();
    }

    public function __call($index, $args)
    {
        $entityFactory = $this->factory;
        return $entityFactory->create($this->repository->get(strtolower($index)));
    }

    public function getHitDie(): string
    {
        return $this->hitDie;
    }

    public function setHitDie($hitDie)
    {
        $this->hitDie = $hitDie;
        return $this;
    }

    public function getProficiencyChoices(): array
    {
        return $this->proficiencyChoices;
    }

    public function setProficiencyChoices($proficiencyChoices)
    {
        $this->proficiencyChoices = $proficiencyChoices;
        return $this;
    }

    public function getProficiencies(): array
    {
        return $this->proficiencies;
    }

    public function setProficiencies($proficiencies)
    {
        $this->proficiencies = $proficiencies;
        return $this;
    }

    public function getSavingThrows(): array
    {
        return $this->savingThrows;
    }

    public function setSavingThrows($savingThrows)
    {
        $this->savingThrows = $savingThrows;
        return $this;
    }

    public function getStartingEquipment(): array
    {
        return $this->startingEquipment;
    }

    public function setStartingEquipment($startingEquipment)
    {
        $this->startingEquipment = $startingEquipment;
        return $this;
    }

    public function getStartingEquipmentOptions(): array
    {
        return $this->startingEquipmentOptions;
    }

    public function setStartingEquipmentOptions($startingEquipmentOptions)
    {
        $this->startingEquipmentOptions = $startingEquipmentOptions;
        return $this;
    }
    
    //returns the url only
    public function getClassLevels(): string
    {
        return $this->classLevels;
    }

    public function setClassLevels($classLevels)
    {
        $this->classLevels = $classLevels;
        return $this;
    }

    public function getMultiClassing(): array
    {
        return $this->multiClassing;
    }

    public function setMultiClassing($multiClassing)
    {
        $this->multiClassing = $multiClassing;
        return $this;
    }

    public function getSubclasses(): array
    {
        return $this->subclasses;
    }

    public function setSubclasses($subclasses)
    {
        $this->subclasses = $subclasses;
        return $this;
    }

    public function getSpellcasting(): array
    {
        $completeSpellcasting = $this->spellcasting;

        if ($this->getIndex() == 'bard') {
            $completeSpellcasting['cantripsKnown'] = 2;
            $completeSpellcasting['spellsKnown'] = 4;
            $completeSpellcasting['spellSlots'] = 2;
        }
        // spells known = cleric level + Wisdom modifier (minimum of 1)
        if ($this->getIndex() == 'cleric') {
            $completeSpellcasting['cantripsKnown'] = 3;
            $completeSpellcasting['spellsKnown'] = 1;
            $completeSpellcasting['spellSlots'] = 2;
        }
        // spells known = druid level + Wisdom modifier (minimum of 1)
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

    public function getSimpleSpellcasting(): array
    {
        return $this->spellcasting;
    }

    public function setSpellcasting($spellcasting)
    {
        $this->spellcasting = $spellcasting;
        return $this;
    }

    public function getSpells(): array
    {
        $completeSpells = $this->spells;
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

    public function getSimpleSpells(): array
    {
        return $this->spells;
    }

    public function setSpells($spells)
    {
        $this->spells = $spells;
        return $this;
    }
}

