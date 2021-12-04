<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Traits;

class TraitsFactory
{
    public function create(array $data): Traits
    {
        $traits = new Traits();
        
        $traits
            ->setIndex($data['index'])
            ->setRaces($data['races'])
            ->setSubraces($data['subraces'])
            ->setDescription($data['desc'])
            ->setProficiencies($data['proficiencies']);
        
        return $traits;
    }
}

