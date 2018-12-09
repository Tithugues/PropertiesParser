<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser\Tests;

use hpeccatte\PropertiesParser\OneLineFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Test class of OneLineFormatter
 */
class OneLineFormatterTest extends TestCase
{
    /**
     * @dataProvider formatProvider
     *
     * @param string $expected Content inline
     * @param string $content Content multilines
     */
    public function testFormat(string $expected, string $content): void
    {
        $formatter = new OneLineFormatter();
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
                'property=value',
                'property=value'
            ],
            [
                'property=value new line',
                'property=value \\
                     new line',
            ],
            [
                'property=value new line and another one',
                'property=value \\
                     new line \\
                     and another one',
            ],
            [
                'property=value \\\\
property2=value2',
                'property=value \\\\
property2=value2',
            ],
            [
                'property=value \\\\value2',
                'property=value \\\\\\
                     value2',
            ],
            [
                'property=value \\\\\\\\
property2=value2',
                'property=value \\\\\\\\
property2=value2',
            ],
        ];
    }
}
