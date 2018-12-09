<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser\Tests;

use hpeccatte\PropertiesParser\Parser;
use PHPUnit\Framework\TestCase;

/**
 * Test class of Parser
 */
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

    /**
     * Provider for testParse
     * @return array
     */
    public function parsingProvider(): array
    {
        return [
            [
                ['property' => 'value'],
                'property=value'
            ],
            [
                [
                    'property' => 'value',
                    'property2' => 'value2'
                ],
                'property=value
property2:value2'
            ],
            [
                ['property' => 'value2'],
                'property=value
property=value2'
            ],
            [
                ['property' => 'value new line'],
                'property=value \\
                     new line'
            ],
            [
                ['property' => 'value !Comment'],
                'property=value \\
                     !Comment'
            ],
            [
                ['property' => 'value which is long'],
                'property=value \\
!Comment
which is long'
            ],
            [
                ['property' => 'value new line and another one'],
                'property=value \\
                     new line \\
                     and another one'
            ],
            [
                [
                    'property' => 'value \\\\',
                    'property2' => 'value2'
                ],
                'property=value \\\\
property2=value2'
            ],
            [
                ['property' => 'value \\\\value2'],
                'property=value \\\\\\
                     value2'
            ],
            [
                [
                    'property' => 'value \\\\\\\\',
                    'property2' => 'value2'
                ],
                'property=value \\\\\\\\
property2=value2'
            ],
        ];
    }
}
