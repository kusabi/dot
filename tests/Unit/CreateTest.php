<?php

namespace Kusabi\Dot\Tests\Unit;

use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    /**
     * @covers \Kusabi\Dot\Dot::__construct
     */
    public function testConstructorWithParameter()
    {
        $dot = new Dot([1, 2, 3]);
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
    public function testInstanceWithParameter()
    {
        $this->assertSame([1, 2, 3], Dot::instance([1, 2, 3])->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::instance
     */
    public function testInstanceWithoutParameter()
    {
        $this->assertSame([], Dot::instance()->getArray());
    }
}
