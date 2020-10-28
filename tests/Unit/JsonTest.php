<?php

namespace Kusabi\Dot\Tests\Unit;

use Kusabi\Dot\Dot;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    /**
     * @covers \Kusabi\Dot\Dot::jsonSerialize
     */
    public function testJsonEncodeEmpty()
    {
        $dot = new Dot();
        $this->assertJsonStringEqualsJsonString(
            json_encode([]),
            json_encode($dot)
        );
    }

    /**
     * @covers \Kusabi\Dot\Dot::jsonSerialize
     */
    public function testJsonEncodeSmall()
    {
        $dot = new Dot(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertJsonStringEqualsJsonString(
            json_encode(['a' => 1, 'b' => 2, 'c' => 3]),
            json_encode($dot)
        );
    }
}
