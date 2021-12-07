<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Classes;

class ClassesFactory
{
    public function create(array $data): Classes
    {
        $classes = new Classes();

        $classes
            ->setIndex($data['index'])
            ->setName($data['name'])
            ->setHitDie($data['hit_die'])
            ->setProficiencyChoices($data['proficiency_choices'])
            ->setSavingThrows($data['saving_throws'])
            ->setStartingEquipment($data['starting_equipment'])
            ->setStartingEquipmentOptions($data['starting_equipment_options'])
            ->setClassLevels($data['class_levels'])
            ->setMultiClassing($data['multi_classing'])
            ->setSubclasses($data['subclasses']);
        
        return $classes;
    }
}

