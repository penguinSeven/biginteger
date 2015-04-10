<?php

namespace PHP\Math\BigIntegerTest;

use PHP\Math\BigInteger\BigInteger;
use PHPUnit_Framework_TestCase;

class BigIntegerDivideTest extends PHPUnit_Framework_TestCase
{
    public function testWithInteger()
    {
        // Arrange
        $bigInteger = new BigInteger('123');

        // Act
        $bigInteger->divide(123);

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('1', $bigInteger->getValue());
    }

    public function testWithString()
    {
        // Arrange
        $bigInteger = new BigInteger('123');

        // Act
        $bigInteger->divide('123');

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('1', $bigInteger->getValue());
    }

    public function testWithBigInteger()
    {
        // Arrange
        $bigInteger = new BigInteger('123');
        $bigIntegerValue = new BigInteger('123');

        // Act
        $bigInteger->divide($bigIntegerValue);

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('1', $bigInteger->getValue());
    }

    public function testWithNegativeNumbber()
    {
        // Arrange
        $bigInteger = new BigInteger('123');
        $bigIntegerValue = new BigInteger('-123');

        // Act
        $bigInteger->divide($bigIntegerValue);

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('-1', $bigInteger->getValue());
    }

    public function testWithTwoNegativeNumbber()
    {
        // Arrange
        $bigInteger = new BigInteger('-123');
        $bigIntegerValue = new BigInteger('-123');

        // Act
        $bigInteger->divide($bigIntegerValue);

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('1', $bigInteger->getValue());
    }

    public function testWithHalfNumbbers()
    {
        // Arrange
        $bigInteger = new BigInteger('3');
        $bigIntegerValue = new BigInteger('2');

        // Act
        $bigInteger->divide($bigIntegerValue);

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('1', $bigInteger->getValue());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testWithInvalidValue()
    {
        // Arrange
        $bigInteger = new BigInteger('123');

        // Act
        $bigInteger->divide('123.123');

        // Assert
        // ...
    }

    public function testWithMutableFalse()
    {
        // Arrange
        $bigInteger = new BigInteger('0', false);

        // Act
        $newBigInteger = $bigInteger->divide('123');

        // Assert
        $this->assertInstanceOf('PHP\Math\BigInteger\BigInteger', $bigInteger);
        $this->assertInstanceOf('PHP\Math\BigInteger\BigInteger', $newBigInteger);
        $this->assertNotEquals(spl_object_hash($newBigInteger), spl_object_hash($bigInteger));
    }

    public function testWithMutableTrue()
    {
        // Arrange
        $bigInteger = new BigInteger('0', true);

        // Act
        $newBigInteger = $bigInteger->divide('123');

        // Assert
        $this->assertInstanceOf('PHP\Math\BigInteger\BigInteger', $bigInteger);
        $this->assertInstanceOf('PHP\Math\BigInteger\BigInteger', $newBigInteger);
        $this->assertEquals(spl_object_hash($newBigInteger), spl_object_hash($bigInteger));
    }
}