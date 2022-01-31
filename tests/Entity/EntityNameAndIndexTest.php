<?php
namespace Dnd5eApi\tests\Entity;

use PHPUnit\Framework\TestCase;
use Dnd5eApi\Entity\AbilityScores;

class EntityNameAndIndexTest extends TestCase
{
    private $scores;
    
    protected function setUp(): void
    {
        $this->scores = new AbilityScores();
    }

    public function testNameReturnsEmptyOnNotSpecificScore(): void
    {
        $this->assertEmpty($this->scores->getName());
    }
    
    public function testIndexReturnsEmptyOnNotSpecificScore(): void
    {
        $this->assertEmpty($this->scores->getIndex());
    }
    
    public function testIndexReturnsCorrectString(): void
    {
        $this->assertEquals('str', ($this->scores->str())->getIndex());
    }
    
    public function testNameReturnsCorrectString(): void
    {
        $this->assertEquals('CON', ($this->scores->con())->getName());
    }
    
}

