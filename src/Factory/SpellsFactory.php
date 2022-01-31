<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Spells;

class SpellsFactory
{

    public function create(array $data): Spells
    {
        $spells = new Spells();

        $spells->setIndex($data['index'])
            ->setName($data['name'])
            ->setDescription($data['desc'])
            ->setRange($data['range'])
            ->setComponents($data['components'])
            ->setRitual($data['ritual'])
            ->setDuration($data['duration'])
            ->setConcentration($data['concentration'])
            ->setCastingTime($data['casting_time'])
            ->setLevel($data['level'])
            ->setSchool($data['school']);

        if (array_key_exists('attack_type', $data)) {
            $spells->setAttackType($data['attack_type']);
        }

        if (array_key_exists('material', $data)) {
            $spells->setMaterial($data['material']);
        }

        if (array_key_exists('damage', $data)) {
            $spells->setDamage($data['damage']);
        }

        if (array_key_exists('higher_level', $data)) {
            $spells->setHigherLevel($data['higher_level']);
        }
        
        if (array_key_exists('heal_at_slot_level', $data)) {
            $spells->setHealSlotLevel($data['heal_at_slot_level']);
        }

        return $spells;
    }
}

