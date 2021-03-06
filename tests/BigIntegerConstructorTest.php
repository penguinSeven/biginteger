<?php
/**
 * phpmath / biginteger (https://github.com/phpmath/biginteger)
 *
 * @link https://github.com/phpmath/biginteger for the canonical source repository
 * @copyright Copyright (c) 2015-2017 phpmath (https://github.com/phpmath)
 * @license https://github.com/phpmath/biginteger/blob/master/LICENSE.md MIT
 */

namespace PHP\Math\BigIntegerTest;

use PHP\Math\BigInteger\BigInteger;
use PHPUnit_Framework_TestCase;

class BigIntegerConstructorTest extends PHPUnit_Framework_TestCase
{
    public function testEmpty()
    {
        // Arrange
        // ...

        // Act
        $bigInteger = new BigInteger();

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('0', $bigInteger->getValue());
    }

    public function testWithInteger()
    {
        // Arrange
        // ...

        // Act
        $bigInteger = new BigInteger(123);

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('123', $bigInteger->getValue());
    }

    public function testWithString()
    {
        // Arrange
        // ...

        // Act
        $bigInteger = new BigInteger('123');

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('123', $bigInteger->getValue());
    }

    public function testWithBigInteger()
    {
        // Arrange
        // ...

        // Act
        $bigIntegerValue = new BigInteger('123');
        $bigInteger = new BigInteger($bigIntegerValue);

        // Assert
        $this->assertInternalType('string', $bigInteger->getValue());
        $this->assertEquals('123', $bigInteger->getValue());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testWithInvalidValue()
    {
        // Arrange
        // ...

        // Act
        new BigInteger('123.123');

        // Assert
        // ...
    }
}
