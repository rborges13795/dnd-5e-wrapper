<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\AbilityScores;

class AbilityScoresFactory
{

    public function create(array $data): AbilityScores
    {
        $abilityScores = new AbilityScores();

        $abilityScores->setIndex($data['index'])
            ->setName($data['name'])
            ->setFullName($data['full_name'])
            ->setDescription($data['desc'])
            ->setSkills($data['skills']);

        return $abilityScores;
    }
}

