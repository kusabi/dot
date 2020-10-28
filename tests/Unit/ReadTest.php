<?php

namespace Kusabi\Dot\Tests\Unit;

use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class ReadTest extends TestCase
{
    /**
     * Data provider for the default return values when a key is not found
     *
     * @return array
     */
    public function defaultValueProvider()
    {
        return [
            [null],
            [false],
            [true],
            [1],
            ['no'],
            [[1, 2, 3]],
            [(object) [1, 2, 3]],
        ];
    }

    /**
     * @covers \Kusabi\Dot\Dot::get
     */
    public function testGet()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => 3
        ]);
        $this->assertSame(1, $dot->get('a'));
        $this->assertSame(2, $dot->get('b'));
        $this->assertSame(3, $dot->get('c'));
    }

    /**
     * @covers \Kusabi\Dot\Dot::getArray
     */
    public function testGetArray()
    {
        $dot = new Dot([1, 2, 3]);
        $this->assertSame([1, 2, 3], $dot->getArray());
    }

    /**
     * @covers       \Kusabi\Dot\Dot::get
     * @dataProvider defaultValueProvider()
     *
     * @param mixed $default
     */
    public function testGetDefaultParameter($default)
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => 3
        ]);
        $this->assertSame($default, $dot->get('d', $default));
    }

    /**
     * @covers \Kusabi\Dot\Dot::get
     */
    public function testGetNested()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => [
                'a' => 1,
                'b' => 2,
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ],
            ],
        ]);

        $this->assertSame(1, $dot->get('a'));
        $this->assertSame(2, $dot->get('b'));
        $this->assertSame([
            'a' => 1,
            'b' => 2,
            'c' => [
                'a' => 1,
                'b' => 2,
                'c' => 3
            ],
        ], $dot->get('c'));
        $this->assertSame(1, $dot->get('c.a'));
        $this->assertSame(2, $dot->get('c.b'));
        $this->assertSame([
            'a' => 1,
            'b' => 2,
            'c' => 3
        ], $dot->get('c.c'));
        $this->assertSame(1, $dot->get('c.c.a'));
        $this->assertSame(2, $dot->get('c.c.b'));
        $this->assertSame(3, $dot->get('c.c.c'));
    }

    /**
     * @covers       \Kusabi\Dot\Dot::get
     * @dataProvider defaultValueProvider()
     *
     * @param mixed $default
     */
    public function testGetNestedDefaultParameter($default)
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => [
                'a' => 1,
                'b' => 2,
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ],
            ],
        ]);
        $this->assertSame($default, $dot->get('d', $default));
        $this->assertSame($default, $dot->get('c.d', $default));
        $this->assertSame($default, $dot->get('c.c.d', $default));
    }
}
