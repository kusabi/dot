<?php

namespace Kusabi\Dot\Tests\Benchmark;

use Kusabi\Dot\Dot;

/**
 * @BeforeMethods({"setup"})
 */
class QueryBench extends Bench
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

    public function benchExistsMiss()
    {
        $this->wideDeep->exists('z.z.z.z.z.z.z');
    }

    public function benchExistsNarrowDeep()
    {
        $this->narrow->exists('a.a.a.a.a.a.a.a.a');
    }

    public function benchExistsNarrowShallow()
    {
        $this->narrow->exists('a');
    }

    public function benchExistsWideDeep()
    {
        $this->narrow->exists('z.c.c.c');
    }

    public function benchExistsWideShallow()
    {
        $this->narrow->exists('z');
    }

    public function benchHasMiss()
    {
        $this->wideDeep->has('z.z.z.z.z.z.z');
    }

    public function benchHasNarrowDeep()
    {
        $this->narrow->has('a.a.a.a.a.a.a.a.a');
    }

    public function benchHasNarrowShallow()
    {
        $this->narrow->has('a');
    }

    public function benchHasWideDeep()
    {
        $this->narrow->has('z.c.c.c');
    }

    public function benchHasWideShallow()
    {
        $this->narrow->has('z');
    }
}
