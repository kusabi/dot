<?php

namespace Kusabi\Dot\Tests\Unit;

use ArrayIterator;
use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    /**
     * @covers \Kusabi\Dot\Dot::__construct
     * @covers \Kusabi\Dot\Dot::parse
     */
    public function testConstructorWithArray()
    {
        $dot = new Dot([1, 2, 3]);
        $this->assertSame([1, 2, 3], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::__construct
     * @covers \Kusabi\Dot\Dot::parse
     */
    public function testConstructorWithDot()
    {
        $first = new Dot([1, 2, 3]);
        $second = new Dot($first);
        $this->assertSame($first->getArray(), $second->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::__construct
     * @covers \Kusabi\Dot\Dot::parse
     */
    public function testConstructorWithIterator()
    {
        $iterator = new ArrayIterator([1, 2, 3]);
        $dot = new Dot($iterator);
        $this->assertSame([1, 2, 3], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::__construct
     */
    public function testConstructorWithoutParameter()
    {
        $dot = new Dot();
        $this->assertSame([], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::instance
     */
    public function testInstanceWithArray()
    {
        $this->assertSame([1, 2, 3], Dot::instance([1, 2, 3])->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::instance
     */
    public function testInstanceWithDot()
    {
        $this->assertSame([1, 2, 3], Dot::instance(Dot::instance([1, 2, 3]))->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::instance
     */
    public function testInstanceWithIterable()
    {
        $iterator = new ArrayIterator([1, 2, 3]);
        $this->assertSame([1, 2, 3], Dot::instance($iterator)->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::instance
     */
    public function testInstanceWithoutParameter()
    {
        $this->assertSame([], Dot::instance()->getArray());
    }
}
