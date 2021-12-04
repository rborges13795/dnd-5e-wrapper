<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Skills;

class SkillsFactory
{
    public function create(array $data): Skills
    {
        $skills = new Skills();
        
        $skills
            ->setIndex($data['index'])
            ->setDescription($data['desc'])
            ->setAbilityScore($data['ability_score']);
        
        return $skills;
    }
}

