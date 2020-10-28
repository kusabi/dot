<?php

namespace Kusabi\Dot\Tests\Benchmark;

use ArrayIterator;
use Kusabi\Dot\Dot;

/**
 * @BeforeMethods({"setup"})
 */
class ManipulateBench extends Bench
{
    protected $dotFlatten;

    public function setup()
    {
        $this->dotFlatten = new Dot();
        $this->dotFlatten->set('a.a', 1);
        $this->dotFlatten->set('a.b', 2);
        $this->dotFlatten->set('a.c', ['a' => 1]);
        $this->dotFlatten->set('a.d', new ArrayIterator(['a' => 1, 'b' => 2]));
        $this->dotFlatten->set('a.e', []);
        $this->dotFlatten->set('a.f', new ArrayIterator([]));
    }

    public function benchFlatten()
    {
        $this->dotFlatten->flatten();
    }
}
