<?php

namespace Kusabi\Dot\Tests\Benchmark;

use Kusabi\Dot\Dot;

class WriteBench extends Bench
{
    public function benchSet1()
    {
        $dot = new Dot();
        $dot->set('a', 1);
    }

    public function benchSet2()
    {
        $dot = new Dot();
        $dot->set('a', 1);
        $dot->set('b', 1);
    }

    public function benchSet26()
    {
        $dot = new Dot();
        $dot->set('a', 1);
        $dot->set('b', 1);
        $dot->set('c', 1);
        $dot->set('d', 1);
        $dot->set('e', 1);
        $dot->set('f', 1);
        $dot->set('g', 1);
        $dot->set('h', 1);
        $dot->set('i', 1);
        $dot->set('j', 1);
        $dot->set('k', 1);
        $dot->set('l', 1);
        $dot->set('m', 1);
        $dot->set('n', 1);
        $dot->set('o', 1);
        $dot->set('p', 1);
        $dot->set('q', 1);
        $dot->set('r', 1);
        $dot->set('s', 1);
        $dot->set('t', 1);
        $dot->set('u', 1);
        $dot->set('v', 1);
        $dot->set('w', 1);
        $dot->set('x', 1);
        $dot->set('y', 1);
        $dot->set('z', 1);
    }

    public function benchSet26Nested6()
    {
        $dot = new Dot();
        $dot->set('a.a.a.a.a.a', 1);
        $dot->set('a.a.a.a.a.b', 1);
        $dot->set('a.a.a.a.a.c', 1);
        $dot->set('a.a.a.a.a.d', 1);
        $dot->set('a.a.a.a.a.e', 1);
        $dot->set('a.a.a.a.a.f', 1);
        $dot->set('a.a.a.a.a.g', 1);
        $dot->set('a.a.a.a.a.h', 1);
        $dot->set('a.a.a.a.a.i', 1);
        $dot->set('a.a.a.a.a.j', 1);
        $dot->set('a.a.a.a.a.k', 1);
        $dot->set('a.a.a.a.a.l', 1);
        $dot->set('a.a.a.a.a.m', 1);
        $dot->set('a.a.a.a.a.n', 1);
        $dot->set('a.a.a.a.a.o', 1);
        $dot->set('a.a.a.a.a.p', 1);
        $dot->set('a.a.a.a.a.q', 1);
        $dot->set('a.a.a.a.a.r', 1);
        $dot->set('a.a.a.a.a.s', 1);
        $dot->set('a.a.a.a.a.t', 1);
        $dot->set('a.a.a.a.a.u', 1);
        $dot->set('a.a.a.a.a.v', 1);
        $dot->set('a.a.a.a.a.w', 1);
        $dot->set('a.a.a.a.a.x', 1);
        $dot->set('a.a.a.a.a.y', 1);
        $dot->set('a.a.a.a.a.z', 1);
    }

    public function benchSetArray()
    {
        $dot = new Dot();
        $dot->setArray([
            'a' => 1,
            'b' => 2,
            'c' => 3
        ]);
    }

    public function benchSetArrayComplex()
    {
        $dot = new Dot();
        $dot->setArray([
            'a' => [
                'a' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ],
                'b' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ],
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ]
            ],
            'b' => [
                'a' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ],
                'b' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ],
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ]
            ],
            'c' => [
                'a' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ],
                'b' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ],
                'c' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3
                ]
            ]
        ]);
    }

    public function benchSetNested17()
    {
        $dot = new Dot();
        $dot->set('a.a.a.a.a.a.a.a.a.a.a.a.a.a.a.a.a', 1);
    }
}
