<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser\Tests;

use hpeccatte\PropertiesParser\EmptyLineRemoverFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Test class of EmptyLineRemoverFormatter
 */
class EmptyLineRemoverFormatterTest extends TestCase
{
    /**
     * @dataProvider formatProvider
     *
     * @param string $expected
     * @param string $content
     */
    public function testFormat(string $expected, string $content): void
    {
        $formatter = new EmptyLineRemoverFormatter();
        $variables = $formatter->format($content);
        $this::assertEquals($expected, $variables);
    }

    /**
     * Provider for testFormat
     * @return array
     */
    public function formatProvider(): array
    {
        return [
            [
                'key=value',
                'key=value'
            ],
            [
                'key=value
key2=value2',
                'key=value
key2=value2',
            ],
            [
                'key=value
key2=value2',
                'key=value

key2=value2',
            ],
            [
                'key=value
key2=value2',
                'key=value


key2=value2',
            ],
        ];
    }
}
