<?php
namespace Dnd5eApi\Factory;

use Dnd5eApi\Entity\EquipmentCategories;

class EquipmentCategoriesFactory
{
    public function create(array $data): EquipmentCategories
    {
        $equipmentCategories = new EquipmentCategories();
        
        $equipmentCategories
            ->setIndex($data['index'])
            ->setEquipment($data['equipment']);
        
        return $equipmentCategories;
    }
}

