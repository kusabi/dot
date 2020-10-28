<?php

namespace Kusabi\Dot\Tests\Benchmark;

use Kusabi\Dot\Dot;

/**
 * @BeforeMethods({"setup"})
 */
class ReadBench extends Bench
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

    public function benchGetMiss()
    {
        $this->narrow->get('z');
    }

    public function benchGetMissDeep()
    {
        $this->narrowDeep->get('z.z.z.z.z.z.z.z');
    }

    public function benchGetNarrow()
    {
        $this->narrow->get('c');
    }

    public function benchGetNarrowDeep()
    {
        $this->narrowDeep->get('c.c.c.c');
    }

    public function benchGetWide()
    {
        $this->wide->get('z');
    }

    public function benchGetWideDeep()
    {
        $this->wideDeep->get('z.c.c.c');
    }
}
