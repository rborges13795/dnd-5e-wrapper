<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Races;

class RacesFactory
{

    public function create(array $data): Races
    {
        $races = new Races();

        $races->setIndex($data['index'])
            ->setName($data['name'])
            ->setSpeed($data['speed'])
            ->setAbilityBonuses($data['ability_bonuses'])
            ->setAlignment($data['alignment'])
            ->setAge($data['age'])
            ->setSize($data['size'])
            ->setSizeDescription($data['size_description'])
            ->setStartingProficiencies($data['starting_proficiencies'])
            ->setLanguages($data['languages'])
            ->setLanguageDescription($data['language_desc'])
            ->setTraits($data['traits'])
            ->setSubraces($data['subraces']);

        if (array_key_exists('ability_bonus_options', $data)) {
            $races->setAbilityBonusOptions($data['ability_bonus_options']);
        }

        if (array_key_exists('starting_proficiency_options', $data)) {
            $races->setStartingProficiencyOptions($data['starting_proficiency_options']);
        }

        if (array_key_exists('language_options', $data)) {
            $races->setLanguageOptions($data['language_options']);
        }

        return $races;
    }
}

