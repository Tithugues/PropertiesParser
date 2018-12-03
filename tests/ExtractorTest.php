<?php
declare(strict_types=1);

use hpeccatte\PropertiesParser\Extractor;
use PHPUnit\Framework\TestCase;

class ExtractorTest extends TestCase
{
    /**
     * @dataProvider extractingProvider
     *
     * @param array $expected
     * @param string $content
     */
    public function testExtract(array $expected, string $content): void
    {
        $extractor = new Extractor();
        $variables = $extractor->extract($content);
        $this::assertEquals($expected, $variables);
    }

    public function extractingProvider()
    {
        return [
            [['key' => 'value'], 'key=value'],
            [['key' => 'value'], 'key:value'],
            [['key' => 'value'], 'key value'],
            [['key' => 'value'], 'key  value'],
            [['key' => 'value'], 'key = value'],
            [['key' => 'value'], 'key =value'],
            [['key' => 'value'], 'key= value'],
            [['key' => 'value'], 'key : value'],
            [['key' => 'value'], 'key :  value'],
            [['key' => 'value'], 'key :value'],
            [['key' => 'value'], 'key: value'],
            [
                ['key' => 'value new line'],
                'key=value new line'
            ],
            [
                ['key' => 'value new line and another one'],
                'key=value new line and another one'
            ],
            [
                ['key' => 'value \\\\', 'key2' => 'value2'],
                'key=value \\\\
key2=value2'
            ],
            [
                ['key' => 'value \\\\value2'],
                'key=value \\\\value2'
            ],
            [
                ['key' => 'value \\\\\\\\', 'key2' => 'value2'],
                'key=value \\\\\\\\
key2=value2'
            ],
        ];
    }
}
