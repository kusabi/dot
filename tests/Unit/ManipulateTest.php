<?php

namespace Kusabi\Dot\Tests\Unit;

use ArrayIterator;
use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class ManipulateTest extends TestCase
{
    /**
     * @covers \Kusabi\Dot\Dot::flatten
     */
    public function testFlatten()
    {
        $dot = new Dot();
        $dot->set('a.a', 1);
        $dot->set('a.b', 2);
        $dot->set('a.c', ['a' => 1]);
        $dot->set('a.d', new ArrayIterator(['a' => 1, 'b' => 2]));
        $dot->set('a.e', []);
        $dot->set('a.f', new ArrayIterator([]));
        $this->assertSame([
            'a.a' => 1,
            'a.b' => 2,
            'a.c.a' => 1,
            'a.d.a' => 1,
            'a.d.b' => 2,
            'a.e' => [],
            'a.f' => []
        ], $dot->flatten());
    }
}
