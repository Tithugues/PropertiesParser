<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser\Tests;

use hpeccatte\PropertiesParser\NoValueExtractor;
use PHPUnit\Framework\TestCase;

/**
 * Test class of NoValueExtractor
 */
class NoValueExtractorTest extends TestCase
{
    /**
     * @dataProvider extractingProvider
     *
     * @param array $expected
     * @param string $content
     */
    public function testExtract(array $expected, string $content): void
    {
        $extractor = new NoValueExtractor();
        $variables = $extractor->extract($content);
        $this::assertEquals($expected, $variables);
    }

    /**
     * Provider for extract method
     * @return array[] Each sub-array contains:
     *                 - an array of properties/values
     *                 - a string which may be a properties file content
     */
    public function extractingProvider(): array
    {
        return [
            [['property' => null], 'property'],
            [
                [
                    'property' => null,
                    'property2' => null
                ],
                'property
property2'
            ],
        ];
    }
}
