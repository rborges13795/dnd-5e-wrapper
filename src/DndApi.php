<?php
namespace Dnd5eApi;

use Dnd5eApi\Entity\AbilityScores;
use Dnd5eApi\Entity\Classes;
use Dnd5eApi\Entity\Equipment;
use Dnd5eApi\Entity\EquipmentCategories;
use Dnd5eApi\Entity\Proficiencies;
use Dnd5eApi\Entity\Races;
use Dnd5eApi\Entity\Skills;
use Dnd5eApi\Entity\Spells;
use Dnd5eApi\Entity\Subclasses;
use Dnd5eApi\Entity\Subraces;
use Dnd5eApi\Entity\Traits;

class DndApi
{

    public function abilityScores(): AbilityScores
    {
        return new AbilityScores();
    }

    public function classes(): Classes
    {
        return new Classes();
    }

    public function equipment(): Equipment
    {
        return new Equipment();
    }

    public function equipmentCategories(): EquipmentCategories
    {
        return new EquipmentCategories();
    }

    public function proficiencies(): Proficiencies
    {
        return new Proficiencies();
    }

    public function races(): Races
    {
        return new Races();
    }

    public function skills(): Skills
    {
        return new Skills();
    }

    public function spells(): Spells
    {
        return new Spells();
    }

    public function subclasses(): Subclasses
    {
        return new Subclasses();
    }

    public function subraces(): Subraces
    {
        return new Subraces();
    }

    public function traits(): Traits
    {
        return new Traits();
    }
}

