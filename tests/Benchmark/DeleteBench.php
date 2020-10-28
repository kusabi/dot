<?php

namespace Kusabi\Dot\Tests\Benchmark;

use Kusabi\Dot\Dot;

/**
 * @BeforeMethods({"setup"})
 */
class DeleteBench extends Bench
{
    /**
     * A narrow array
     *
     * @var Dot
     */
    protected $narrow;

    /**
     * A narrow deep array
     *
     * @var Dot
     */
    protected $narrowDeep;

    /**
     * A wide array
     *
     * @var Dot
     */
    protected $wide;

    /**
     * A wide deep array
     *
     * @var Dot
     */
    protected $wideDeep;

    public function setup()
    {
        $this->narrow = $this->createNarrowShallowDot();
        $this->narrowDeep = $this->createNarrowDeepDot();
        $this->wide = $this->createWideShallowDot();
        $this->wideDeep = $this->createWideDeepDot();
    }

    public function benchDeleteMiss()
    {
        $this->narrow->delete('z');
    }

    public function benchDeleteMissDeep()
    {
        $this->narrowDeep->delete('z.z.z.z.z.z.z.z');
    }

    public function benchDeleteNarrow()
    {
        $this->narrow->delete('c');
    }

    public function benchDeleteNarrowDeep()
    {
        $this->narrowDeep->delete('c.c.c.c');
    }

    public function benchDeleteWide()
    {
        $this->wide->delete('z');
    }

    public function benchDeleteWideDeep()
    {
        $this->wideDeep->delete('z.c.c.c');
    }
}
