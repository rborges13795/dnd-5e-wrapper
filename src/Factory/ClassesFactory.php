<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Classes;
use Dnd5eApi\Repository\Dnd5eRepository;

class ClassesFactory
{
    public function create(array $data): Classes
    {
        $classes = new Classes();

        $classes->setIndex($data['index'])
        ->setName($data['name'])
        ->setHitDie($data['hit_die'])
        ->setProficiencyChoices($data['proficiency_choices'])
        ->setProficiencies($data['proficiencies'])
        ->setSavingThrows($data['saving_throws'])
        ->setClassLevels($data['class_levels'])
        ->setMultiClassing($data['multi_classing'])
        ->setSubclasses($data['subclasses']);
        
        $classes = $this->classEquipment($classes);
        
        if (array_key_exists('spellcasting', $data)) {
            $classes->setSpellcasting($data['spellcasting']);
        }
        
        if (array_key_exists('spells', $data)) {
            $classes = $this->classSpells($classes);
        }
        
        return $classes;
    }
    
    private function classSpells(Classes $class)
    {
        $repository = new Dnd5eRepository();
        $results = $repository->get($class->getUrl() . '/spells');
        foreach ($results['results'] as $value) {
            $spells[] = $value;
        }
        
        $class->setSpells($spells);
        
        return $class;
    }
    
    //did this manually because the api's starting_equipment_options array is insane.
    private function classEquipment(Classes $class)
    {
        if ($class->getIndex() == 'barbarian') {
            $class->setStartingEquipmentOptions([
                "A greataxe or any martial melee weapon",
                "Two handaxes or any simple weapon",
            ]);
            $class->setStartingEquipment([
                "An explorer's pack and four javelins"
            ]);
        }
        
        if ($class->getIndex() == 'bard') {
            $class->setStartingEquipmentOptions([
                "A rapier or a longsword or any simple weapon",
                "A diplomat's pack or an entertainer's pack",
                "A lute, or any other musical instrument"
            ]);
            $class->setStartingEquipment([
                "Leather armor and a dagger"
            ]);
        }
        
        if ($class->getIndex() == 'cleric') {
            $class->setStartingEquipmentOptions([
                "A mace or a warhammer (if proficient)",
                "A scale mail or leather armor or chain mail (if proficient)",
                "A light crossbow and 20 bolts or any simple weapon",
                "A priest's pack or an explorer's pack"
            ]);
            $class->setStartingEquipment([
                "A shield and a holy symbol"
            ]);
        }
        
        if ($class->getIndex() == 'druid') {
            $class->setStartingEquipmentOptions([
                "A wooden shield or any simple weapon",
                "A scimitar or any simple melee weapon"
            ]);
            $class->setStartingEquipment([
                "Leather armor, and explorer's pack and a druidic focus"
            ]);
        }
        
        if ($class->getIndex() == 'fighter') {
            $class->setStartingEquipmentOptions([
                "A chain mail or leather, longbow and 20 arrows",
                "A martial weapon and a shield or two martial weapons",
                "A light crossbow and 20 bows or two handaxes",
                "A dungeoneer's pack or an explorer's pack",
            ]);
            $class->setStartingEquipment([
                ""
            ]);
        }
        
        if ($class->getIndex() == 'monk') {
            $class->setStartingEquipmentOptions([
                "A shortsword or any simple weapon",
                "A dungeoneer's pack or an explorer's pack"
            ]);
            $class->setStartingEquipment([
                "10 darts"
            ]);
        }
        
        if ($class->getIndex() == 'paladin') {
            $class->setStartingEquipmentOptions([
                "A martial weapon and a shield or two martial weapons",
                "Five javelins or any simple melee weapon",
                "A priest's pack or an explorer's pack"
            ]);
            $class->setStartingEquipment([
                "Chain mail and a holy symbol"
            ]);
        }
        
        if ($class->getIndex() == 'ranger') {
            $class->setStartingEquipmentOptions([
                "Scale mail or leather armor",
                "Two shortswords or two simple melee weapons",
                "A dungeoneer's pack or an explorer's pack"
            ]);
            $class->setStartingEquipment([
                "A longbow and a quiver of 20 arrows"
            ]);
        }
        
        if ($class->getIndex() == 'rogue') {
            $class->setStartingEquipmentOptions([
                "A rapier or a shortsword",
                "A shortbow and quiver of 20 arrows or a shortsword",
                "A burglar's pack or a dungeoneer's pack or an explorer's pack"
            ]);
            $class->setStartingEquipment([
                "Leather armor, two daggers, and a thieves' tools"
            ]);
        }
        
        if ($class->getIndex() == 'sorcerer') {
            $class->setStartingEquipmentOptions([
                "A light crossbow and 20 bolts or any simple weapon",
                "A component pouch or an arcane focus",
                "A dungeoneer's pack or an explorer's pack"
            ]);
            $class->setStartingEquipment([
                "Two daggers"
            ]);
        }
        
        if ($class->getIndex() == 'warlock') {
            $class->setStartingEquipmentOptions([
                "A light crossbow and 20 bolts or any simple weapon",
                "A component pouch or an arcane focus",
                "A scholar's pack or a dungeoneer's pack"
                
            ]);
            $class->setStartingEquipment([
                "Leather armor, any simple weapon, and two daggers"
            ]);
        }
        
        if ($class->getIndex() == 'wizard') {
            $class->setStartingEquipmentOptions([
                "A quarterstaff or a dagger",
                "A component pouch or an arcane focus",
                "A scholar's pack or an explorer's pack"
            ]);
            $class->setStartingEquipment([
                "A spellbook"
            ]);
        }
        
        return $class;
    }
}

