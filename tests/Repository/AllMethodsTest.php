<?php
namespace Dnd5eApi\tests\Repository;

use PHPUnit\Framework\TestCase;
use Dnd5eApi\Entity\AbilityScores;

class AllMethodsTest extends TestCase
{
    private $scores;
    
    protected function setUp(): void
    {
        $this->scores = new AbilityScores();
    }
    
    public function testAllReturnsFilledArray(): void
    {
        $this->assertTrue(in_array('cha', $this->scores->all()));
        $this->assertFalse(empty($this->scores->all()));
    }
    
    public function testAllUpperCaseReturnsFilledArray(): void
    {
        $this->assertTrue(in_array('CHA', $this->scores->allFirstCharUppercase()));
        $this->assertFalse(empty($this->scores->all()));
    }
}

