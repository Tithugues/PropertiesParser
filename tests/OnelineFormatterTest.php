<?php
declare(strict_types=1);

use hpeccatte\PropertiesParser\OnelineFormatter;
use PHPUnit\Framework\TestCase;

class OnelineFormatterTest extends TestCase
{
    /**
     * @dataProvider formatProvider
     *
     * @param string $expected Content inlined
     * @param string $content Content multilined
     */
    public function testFormat(string $expected, string $content)
    {
        $formatter = new OnelineFormatter();
        $variables = $formatter->format($content);
        $this::assertEquals($expected, $variables);
    }

    public function formatProvider()
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
