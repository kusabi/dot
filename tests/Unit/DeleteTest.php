<?php

namespace Kusabi\Dot\Tests\Unit;

use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class DeleteTest extends TestCase
{
    /**
     * @covers \Kusabi\Dot\Dot::delete
     */
    public function testDeleteNested()
    {
        $dot = new Dot([
            'a' => [
                'a' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
                'b' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
            ],
            'b' => [
                'a' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
                'b' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
            ],
            'c' => [
                'a' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
                'b' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
            ],
        ]);
        $dot->delete('a')->delete('b.a')->delete('c.b.a');
        $this->assertSame([
            'b' => [
                'b' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
            ],
            'c' => [
                'a' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
                'b' => [
                    'b' => 2,
                    'c' => 3,
                ],
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                ],
            ],
        ], $dot->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::delete
     */
    public function testDeleteNotExists()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ]);
        $this->assertSame([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ], $dot->delete('d')->delete('a.b.c')->getArray());
    }

    /**
     * @covers \Kusabi\Dot\Dot::delete
     */
    public function testDeleteSimple()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ]);
        $this->assertSame([
            'a' => 1,
            'c' => 3,
        ], $dot->delete('b')->getArray());
    }
}
