<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\Equipment;

class EquipmentFactory
{
    public function create(array $data): Equipment
    {
        $equipment = new Equipment();
        
        $equipment
            ->setIndex($data['index'])
            ->setName($data['name'])
            ->setEquipmentCategory($data['equipment_category'])
            ->setCost($data['cost'])
            ->setWeight($data['weight']);
        
        if(array_key_exists('armor_category', $data)) {
            $equipment
                ->setArmorCategory($data['armor_category'])
                ->setArmorClass($data['armor_class'])
                ->setStrMinimun($data['str_minimum'])
                ->setStealthDisadvantage($data['stealth_disadvantage']);
        }
        
        if(array_key_exists('weapon_category', $data)) {
            $equipment
                ->setWeaponCategory($data['weapon_category'])
                ->setWeaponRange($data['weapon_range'])
                ->setCategoryRange($data['category_range'])
                ->setCost($data['cost'])
                ->setDamage($data['damage'])
                ->setRange($data['range'])
                ->setProperties($data['properties']);
            
            if(array_key_exists('throw_range', $data)) {
                $equipment->setThrowRange($data['throw_range']);
            }
        }
        
        if(array_key_exists('gear_category', $data)) {
            $equipment->setGearCategory($data['gear_category']);
        }
        
        return $equipment;
    }
}

