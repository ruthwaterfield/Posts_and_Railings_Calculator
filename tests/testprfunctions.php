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

    /**
     * testS1isValidFence uses a regular valid fence.
     */
    public function testS1isValidFence() {
        $numPosts = 4;
        $numRailings = 3;
        $expected = true;
        $actual = isValidFence($numPosts, $numRailings);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testS2isValidFence uses the minimum fence.
     */
    public function testS2isValidFence() {
        $numPosts = 2;
        $numRailings = 1;
        $expected = true;
        $actual = isValidFence($numPosts, $numRailings);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testS3isValidFence uses too few posts.
     */
    public function testS3isValidFence() {
        $numPosts = 1;
        $numRailings = 1;
        $expected = false;
        $actual = isValidFence($numPosts, $numRailings);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testS4isValidFence uses too few railings.
     */
    public function testS4isValidFence() {
        $numPosts = 4;
        $numRailings = 0;
        $expected = false;
        $actual = isValidFence($numPosts, $numRailings);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testS5isValidFence the wrong ratio of posts and railings.
     */
    public function testS5isValidFence() {
        $numPosts = 4;
        $numRailings = 2;
        $expected = false;
        $actual = isValidFence($numPosts, $numRailings);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testFisValidFence uses a negative number for the number of posts.
     */
    public function testFisValidFence() {
        $numPosts = -3;
        $numRailings = 4;
        $expected = false;
        $actual = isValidFence($numPosts, $numRailings);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testMisValidFence uses wrong data types for posts and railings.
     */
    public function testMisValidFence() {
        $numPosts = 'lemon';
        $numRailings = 6.7;
        $this->expectException(TypeError::class);
        isValidFence($numPosts, $numRailings);
    }


}

?>