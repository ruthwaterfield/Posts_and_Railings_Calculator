<?php
use PHPUnit\Framework\TestCase;

require ('../prfunctions.php');

class StackTest extends TestCase
{
    const POST = 0.1;
    const RAILING = 1.5;
    const MINPOSTS = 2;
    const MINRAILINGS = 1;

    /**
     * testScalculateLength uses expected numbers of posts and railings.
     */
    public function testScalculateLength() {
        $numPosts = 4;
        $numRailings = 3;
        $expected = (4*POST + 3*RAILING);
        $actual = calculateLength($numPosts, $numRailings);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testFcalculateLength uses unexpected numbers of posts and railings.
     */
    public function testFcalculateLength() {
        $numPosts = 10;
        $numRailings = 3;
        $expected = (10*POST + 3*RAILING);
        $actual = calculateLength($numPosts, $numRailings);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testMcalculateLength uses wrong data types for posts and railings.
     */
    public function testMcalculateLength() {
        $numPosts = 'lemon';
        $numRailings = 3.2;
        $this->expectException(TypeError::class);
        calculateLength($numPosts, $numRailings);
    }

    public function testSisValidFence() {
        
    }

    public function testFisValidFence() {

    }

    public function testMisValidFence() {

    }




}

?>