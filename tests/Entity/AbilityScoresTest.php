<?php
namespace Dnd5eApi\tests\Entity;

use PHPUnit\Framework\TestCase;
use Dnd5eApi\Entity\AbilityScores;

class AbilityScoresTest extends TestCase
{
    private $scores;
    
    protected function setUp(): void
    {
        $this->scores = new AbilityScores();
    }
    
    public function testFullNameReturnsCorrectOnSpecificScore(): void
    {
        $this->assertEquals('Charisma', ($this->scores->cha())->getFullName());
    }
}

