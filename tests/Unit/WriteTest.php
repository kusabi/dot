<?php

namespace Kusabi\Dot\Tests\Unit;

use ArrayIterator;
use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class WriteTest extends TestCase
{
    /**
     * @covers \Kusabi\Dot\Dot::setArray
     * @covers \Kusabi\Dot\Dot::parse
     */
    public function testSetArrayWithArray()
    {
        $dot = new Dot();
        $this->assertSame([], $dot->getArray());
        $dot->setArray([
            1,
            2,
            3
        ]);
        $this->assertSame([
            1,
            2,
            3
        ], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::setArray
     * @covers \Kusabi\Dot\Dot::parse
     */
    public function testSetArrayWithDot()
    {
        $first = new Dot([1, 2, 3]);
        $second = new Dot();
        $this->assertSame([], $second->getArray());
        $second->setArray($first);
        $this->assertSame([
            1,
            2,
            3
        ], $second->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::setArray
     * @covers \Kusabi\Dot\Dot::parse
     */
    public function testSetArrayWithIterator()
    {
        $iterator = new ArrayIterator([1, 2, 3]);
        $dot = new Dot();
        $this->assertSame([], $dot->getArray());
        $dot->setArray($iterator);
        $this->assertSame([
            1,
            2,
            3
        ], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::setArray
     */
    public function testSetArrayIsChainable()
    {
        $dot = new Dot();
        $this->assertSame([], $dot->getArray());
        $this->assertSame([
            1,
            2,
            3
        ], $dot->setArray([
            1,
            2,
            3
        ])->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::set
     */
    public function testSetIsChainable()
    {
        $dot = new Dot();
        $this->assertSame([
            'a' => 1,
            'b' => 2
        ], $dot->set('a', 1)->set('b', 2)->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::set
     */
    public function testSetMultipleKeys()
    {
        $dot = new Dot();
        $dot->set('a', 1);
        $dot->set('b', 2);
        $dot->set('c', 3);
        $this->assertSame([
            'a' => 1,
            'b' => 2,
            'c' => 3
        ], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::set
     */
    public function testSetNestedKeys()
    {
        $dot = new Dot();
        $dot->set('a', 1);
        $dot->set('b.b', 2);
        $dot->set('c.c.c', 3);
        $dot->set('d.d.d.d', 4);
        $this->assertSame([
            'a' => 1,
            'b' => [
                'b' => 2
            ],
            'c' => [
                'c' => [
                    'c' => 3
                ]
            ],
            'd' => [
                'd' => [
                    'd' => [
                        'd' => 4
                    ]
                ]
            ]
        ], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::set
     */
    public function testSetOverwritesExistingKey()
    {
        $dot = new Dot();
        $dot->set('a', 1);
        $dot->set('b', 2);
        $dot->set('a', 3);
        $this->assertSame([
            'a' => 3,
            'b' => 2
        ], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::set
     */
    public function testSetOverwritesExistingKeys()
    {
        $dot = new Dot();
        $dot->set('a', 1);
        $dot->set('a.a', 1);
        $this->assertSame([
            'a' => [
                'a' => 1
            ],
        ], $dot->getArray());
    }
}
