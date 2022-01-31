<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Proficiencies;

class ProficienciesFactory
{

    public function create(array $data): Proficiencies
    {
        $proficiencies = new Proficiencies();

        $proficiencies->setIndex($data['index'])
            ->setName($data['name'])
            ->setType($data['type'])
            ->setClasses($data['classes'])
            ->setRaces($data['races']);

        return $proficiencies;
    }
}

