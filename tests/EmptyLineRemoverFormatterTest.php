<?php
declare(strict_types=1);

use hpeccatte\PropertiesParser\EmptyLineRemoverFormatter;
use PHPUnit\Framework\TestCase;

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
