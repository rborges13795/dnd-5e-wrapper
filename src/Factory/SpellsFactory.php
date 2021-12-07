<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Spells;

class SpellsFactory
{
    public function create(array $data): Spells
    {
        $spells = new Spells();
        
        $spells
            ->setIndex($data['index'])
            ->setName($data['name'])
            ->setDescription($data['desc'])
            ->setRange($data['range'])
            ->setComponents($data['components'])
            ->setMaterial($data['material'])
            ->setRitual($data['ritual'])
            ->setDuration($data['duration'])
            ->setConcentration($data['concentration'])
            ->setCastingTime($data['casting_time'])
            ->setLevel($data['level'])
            ->setAttackType($data['attack_type'])
            ->setDamage($data['damage'])
            ->setSchool($data['school']);
        
        if (array_key_exists('higher_level', $data)) {
            $spells->setHigherLevel($data['higher_level']);
        }
        
        return $spells;
    }
}

