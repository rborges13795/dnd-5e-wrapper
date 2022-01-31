<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Subraces;

class SubracesFactory
{

    public function create(array $data): Subraces
    {
        $subraces = new Subraces();

        $subraces->setIndex($data['index'])
            ->setName($data['name'])
            ->setRace($data['race'])
            ->setDescription($data['desc'])
            ->setAbilityBonuses($data['ability_bonuses'])
            ->setStartingProficiencies($data['starting_proficiencies'])
            ->setLanguages($data['languages'])
            ->setRacialTraits($data['racial_traits']);

        if (array_key_exists('language_options', $data)) {
            $subraces->setLanguageOptions($data['language_options']);
        }

        return $subraces;
    }
}

