<?php

namespace Kusabi\Dot\Tests\Unit;

use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    /**
     * A list fo values and the result of using has and discovering that value using a hard check
     *
     * @var array
     */
    const HAS_VALUE_HARD_RESULTS = [
        false => false,
        true => true,
        0 => true,
        1 => true,
    ];

    /**
     * A list fo values and the result of using has and discovering that value using a soft check
     *
     * @var array
     */
    const HAS_VALUE_SOFT_RESULTS = [
        0 => false,
        1 => true,
    ];

    /**
     * @covers \Kusabi\Dot\Dot::exists
     */
    public function testExist()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => [
                'b' => 2
            ],
        ]);
        $this->assertTrue($dot->exists('a'));
        $this->assertTrue($dot->exists('b'));
        $this->assertFalse($dot->exists('b.a'));
        $this->assertTrue($dot->exists('b.b'));
        $this->assertFalse($dot->exists('c'));
    }

    /**
     * @covers \Kusabi\Dot\Dot::exists
     */
    public function testExistsWithHasValues()
    {
        $dot = new Dot();
        $letter = 'a';
        foreach (self::HAS_VALUE_SOFT_RESULTS as $value => $hasSoftResult) {
            $dot->set($letter, $value);
            $this->assertTrue($dot->exists($letter));
            $letter++;
        }

        $dot = new Dot();
        $letter = 'a';
        foreach (self::HAS_VALUE_HARD_RESULTS as $value => $hasHardResult) {
            $dot->set($letter, $value);
            $this->assertTrue($dot->exists($letter));
            $letter++;
        }
    }

    /**
     * @covers \Kusabi\Dot\Dot::has
     */
    public function testHas()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => false,
            'c' => [
                'a' => 1,
                'b' => 0,
                'c' => false,
            ],
        ]);

        // Soft checks
        $this->assertTrue($dot->has('a', false));
        $this->assertFalse($dot->has('b', false));
        $this->assertTrue($dot->has('c', false));
        $this->assertTrue($dot->has('c.a', false));
        $this->assertFalse($dot->has('c.b', false));
        $this->assertFalse($dot->has('c.c', false));
        $this->assertFalse($dot->has('d', false));

        // Hard checks
        $this->assertTrue($dot->has('a', true));
        $this->assertFalse($dot->has('b', true));
        $this->assertTrue($dot->has('c', true));
        $this->assertTrue($dot->has('c.a', true));
        $this->assertTrue($dot->has('c.b', true));
        $this->assertFalse($dot->has('c.c', true));
        $this->assertFalse($dot->has('d', true));
    }

    /**
     * @covers \Kusabi\Dot\Dot::has
     */
    public function testHasDefaultsToSoftCheck()
    {
        $dot = new Dot([
            'a' => 1,
            'b' => 0,
        ]);
        $this->assertTrue($dot->has('a'));
        $this->assertFalse($dot->has('b'));
    }

    /**
     * @covers \Kusabi\Dot\Dot::has
     */
    public function testHasWithHasValues()
    {
        $dot = new Dot();
        $letter = 'a';
        foreach (self::HAS_VALUE_SOFT_RESULTS as $value => $hasSoftResult) {
            $dot->set($letter, $value);
            $this->assertSame($hasSoftResult, $dot->has($letter, false));
            $letter++;
        }

        $dot = new Dot();
        $letter = 'a';
        foreach (self::HAS_VALUE_HARD_RESULTS as $value => $hasHardResult) {
            $dot->set($letter, $value);
            $this->assertSame($hasHardResult, $dot->has($letter, true));
            $letter++;
        }
    }
}
