<?php
declare(strict_types=1);

use hpeccatte\PropertiesParser\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    /**
     * @dataProvider parsingProvider
     *
     * @param array $expected
     * @param string $content
     */
    public function testParse(array $expected, string $content): void
    {
        $parser = new Parser();
        $variables = $parser->parse($content);
        $this::assertEquals($expected, $variables);
    }

    public function parsingProvider(): array
    {
        return [
            [
                ['key' => 'value'],
                'key=value'
            ],
            [
                [
                    'key' => 'value',
                    'key2' => 'value2'
                ],
                'key=value
key2:value2'
            ],
            [
                ['key' => 'value2'],
                'key=value
key=value2'
            ],
            [
                ['key' => 'value new line'],
                'key=value \\
                     new line'
            ],
            [
                ['key' => 'value !Comment'],
                'key=value \\
                     !Comment'
            ],
            [
                ['key' => 'value which is long'],
                'key=value \\
!Comment
which is long'
            ],
            [
                ['key' => 'value new line and another one'],
                'key=value \\
                     new line \\
                     and another one'
            ],
            [
                [
                    'key' => 'value \\\\',
                    'key2' => 'value2'
                ],
                'key=value \\\\
key2=value2'
            ],
            [
                ['key' => 'value \\\\value2'],
                'key=value \\\\\\
                     value2'
            ],
            [
                [
                    'key' => 'value \\\\\\\\',
                    'key2' => 'value2'
                ],
                'key=value \\\\\\\\
key2=value2'
            ],
        ];
    }
}
