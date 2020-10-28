<?php

namespace Kusabi\Dot\Tests\Benchmark;

use Kusabi\Dot\Dot;

/**
 * @Revs(500)
 * @Iterations(3)
 */
class Bench
{
    /**
     * Create a narrow and shallow dot instance
     *
     * @return Dot
     */
    protected function createNarrowShallowDot()
    {
        return new Dot([
            'a' => 1
        ]);
    }

    /**
     * Create a narrow and deep dot instance
     *
     * @return Dot
     */
    protected function createNarrowDeepDot()
    {
        return new Dot([
            'a' => [
                'a' => [
                    'a' => [
                        'a' => [
                            'a' => [
                                'a' => [
                                    'a' => [
                                        'a' => [
                                            'a' => 1
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }

    /**
     * Create a wide and shallow dot instance
     *
     * @return Dot
     */
    protected function createWideShallowDot()
    {
        return new Dot([
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4,
            'e' => 5,
            'f' => 6,
            'g' => 7,
            'h' => 8,
            'i' => 9,
            'j' => 10,
            'k' => 11,
            'l' => 12,
            'm' => 13,
            'n' => 14,
            'o' => 15,
            'p' => 16,
            'q' => 17,
            'r' => 18,
            's' => 19,
            't' => 20,
            'u' => 21,
            'v' => 22,
            'w' => 23,
            'x' => 24,
            'y' => 25,
            'z' => 26,
        ]);
    }

    /**
     * Create a wide and DEEP dot instance
     *
     * @return Dot
     */
    protected function createWideDeepDot()
    {
        return new Dot([
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
            'd' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'e' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'f' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'g' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'h' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'i' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'j' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'k' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'l' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'm' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'n' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'o' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'p' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'q' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'r' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            's' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            't' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'u' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'v' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'w' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'x' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'y' => [
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ],
            'z' => [
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
                    'c' => [
                        'a' => 1,
                        'b' => 2,
                        'c' => 3,
                    ],
                ],
            ],
        ]);
    }
}
