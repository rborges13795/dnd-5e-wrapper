<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Subclasses;

class SubclassesFactory
{
    public function create(array $data): Subclasses
    {
        $subclasses = new Subclasses();
        
        $subclasses
            ->setIndex($data['index'])
            ->setName($data['name'])
            ->setClass($data['class'])
            ->setSubclassFlavor($data['subclass_flavor'])
            ->setDescription($data['desc'])
            ->setSubclassLevels($data['subclass_levels']);
        
        return $subclasses;
    }
}

