<?php
namespace Dnd5eApi\tests\Entity;

use PHPUnit\Framework\TestCase;
use Dnd5eApi\Entity\Classes;
use function PHPUnit\Framework\assertEmpty;
use function PHPUnit\Framework\assertIsArray;
use function PHPUnit\Framework\assertNotEmpty;

class ClassesTest extends TestCase
{
    private $class;
    
    protected function setUp(): void
    {
        $this->class = new Classes();
    }
    
    public function testGetSpellsReturnEmptyArray(): void
    {
        $fighter = ($this->class)->fighter();
        
        assertIsArray($fighter->getSpells());
        assertEmpty($fighter->getSpells());
    }
    
    public function testGetSpellCastingReturnEmptyArray(): void
    {
        $fighter = ($this->class)->fighter();
        
        assertIsArray($fighter->getSpellCasting());
        assertEmpty($fighter->getSpellCasting());
    }
    
    public function testGetSpellsReturnFilledArray(): void
    {
        $bard = ($this->class)->bard();
        
        assertIsArray($bard->getSimpleSpells());
        assertNotEmpty($bard->getSimpleSpells());
    }
    
    public function testGetSpellCastingReturnFilledArray(): void
    {
        $bard = ($this->class)->bard();
        
        assertIsArray($bard->getSpellCasting());
        assertNotEmpty($bard->getSpellCasting());
    }
    
    
}

