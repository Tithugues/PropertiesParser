<?php
declare(strict_types=1);

use hpeccatte\PropertiesParser\OneLineFormatter;
use PHPUnit\Framework\TestCase;

class OneLineFormatterTest extends TestCase
{
    /**
     * @dataProvider formatProvider
     *
     * @param string $expected Content inlined
     * @param string $content Content multilined
     */
    public function testFormat(string $expected, string $content): void
    {
        $formatter = new OneLineFormatter();
        $variables = $formatter->format($content);
        $this::assertEquals($expected, $variables);
    }

    public function formatProvider(): array
    {
        return [
            [
                'key=value',
                'key=value'
            ],
            [
                'key=value new line',
                'key=value \\
                     new line',
            ],
            [
                'key=value new line and another one',
                'key=value \\
                     new line \\
                     and another one',
            ],
            [
                'key=value \\\\
key2=value2',
                'key=value \\\\
key2=value2',
            ],
            [
                'key=value \\\\value2',
                'key=value \\\\\\
                     value2',
            ],
            [
                'key=value \\\\\\\\
key2=value2',
                'key=value \\\\\\\\
key2=value2',
            ],
        ];
    }
}
