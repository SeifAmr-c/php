<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Calculator.php';

class CalculatorTest extends TestCase
{
    public function testCalculator() : void {
        $add = new Calculator(1,2)  ; 
        $this->assertEquals(3,$add->add(1,2)) ; 
        $this->assertEquals(12,$add->multiply(4,3)) ; 
    }
}