<?php

namespace Kusabi\Dot\Tests\Unit;

use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    /**
     * @covers \Kusabi\Dot\Dot::count
     */
    public function testCount()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => [
                'a' => 1,
                'b' => 2,
                'c' => 3
            ]
        ]);
        $this->assertSame(3, $dot->count());
        $this->assertSame(3, count($dot));
        $this->assertCount(3, $dot);
    }

    /**
     * @covers \Kusabi\Dot\Dot::offsetExists
     */
    public function testExists()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => [
                'a' => 1,
                'b' => 2,
                'c' => 3
            ]
        ]);
        $this->assertTrue(isset($dot['a']));
        $this->assertTrue(isset($dot['b']));
        $this->assertTrue(isset($dot['c']));
        $this->assertTrue(isset($dot['c.a']));
        $this->assertTrue(isset($dot['c.b']));
        $this->assertTrue(isset($dot['c.c']));
        $this->assertFalse(isset($dot['d']));
    }

    /**
     * @covers \Kusabi\Dot\Dot::offsetGet
     */
    public function testGet()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => [
                'a' => 1,
                'b' => 2,
                'c' => 3
            ]
        ]);
        $this->assertSame(1, $dot['a']);
        $this->assertSame(2, $dot['b']);
        $this->assertSame([
            'a' => 1,
            'b' => 2,
            'c' => 3
        ], $dot['c']);
        $this->assertSame(1, $dot['c.a']);
        $this->assertSame(2, $dot['c.b']);
        $this->assertSame(3, $dot['c.c']);
        $this->assertSame(null, $dot['d']);
    }

    /**
     * @covers \Kusabi\Dot\Dot::getIterator
     */
    public function testIterable()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => [
                'a' => 1,
                'b' => 2,
                'c' => 3
            ]
        ]);
        foreach ($dot as $key => $value) {
            $items[$key] = $value;
        }
        $this->assertSame($dot->getArray(), $items);
    }

    /**
     * @covers \Kusabi\Dot\Dot::offsetSet
     */
    public function testSet()
    {
        $dot = new Dot();
        $dot['a'] = 1;
        $dot['b.a'] = 1;
        $this->assertSame([
            'a' => 1,
            'b' => [
                'a' => 1
            ],
        ], $dot->getArray());
        $this->assertSame(1, $dot['a']);
        $this->assertSame(1, $dot['b.a']);
    }

    /**
     * @covers \Kusabi\Dot\Dot::offsetSet
     */
    public function testSetWithoutKey()
    {
        $dot = new Dot();
        $dot['a'] = 1;
        $dot[] = 1;
        $dot[] = 1;
        $this->assertSame([
            'a' => 1,
            0 => 1,
            1 => 1,
        ], $dot->getArray());
        $this->assertSame(1, $dot['a']);
        $this->assertSame(1, $dot[0]);
        $this->assertSame(1, $dot[1]);
    }

    /**
     * @covers \Kusabi\Dot\Dot::offsetUnset
     */
    public function testUnset()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => [
                'a' => 1,
                'b' => 1,
                'c' => 1,
            ],
            'c' => 1
        ]);
        unset($dot['a']);
        unset($dot['b.a']);
        $this->assertSame([
            'b' => [
                'b' => 1,
                'c' => 1,
            ],
            'c' => 1,
        ], $dot->getArray());
    }
}
