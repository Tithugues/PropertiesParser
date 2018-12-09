<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser\Tests;

use hpeccatte\PropertiesParser\PropertyWithValueExtractor;
use PHPUnit\Framework\TestCase;

/**
 * Test class of PropertyWithValueExtractor
 */
class PropertyWithValueExtractorTest extends TestCase
{
    /**
     * @dataProvider extractingProvider
     *
     * @param array $expected
     * @param string $content
     */
    public function testExtract(array $expected, string $content): void
    {
        $extractor = new PropertyWithValueExtractor();
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
            [['property' => 'value'], 'property=value'],
            [['property' => 'value'], 'property:value'],
            [['property' => 'value'], 'property value'],
            [['property' => 'value'], 'property  value'],
            [['property' => 'value'], 'property = value'],
            [['property' => 'value'], 'property =value'],
            [['property' => 'value'], 'property= value'],
            [['property' => 'value'], 'property : value'],
            [['property' => 'value'], 'property :  value'],
            [['property' => 'value'], 'property :value'],
            [['property' => 'value'], 'property: value'],
            [['property=long' => 'value'], 'property\=long=value'],
            [['property:long' => 'value'], 'property\:long:value'],
            [['property long' => 'value'], 'property\ long value'],
            [['property ' => 'long value'], 'property\  long value'],
            [['property=long' => 'value'], 'property\=long:value'],
            [
                ['property' => 'value new line'],
                'property=value new line'
            ],
            [
                ['property' => 'value new line and another one'],
                'property=value new line and another one'
            ],
            [
                ['property' => 'value \\\\', 'property2' => 'value2'],
                'property=value \\\\
property2=value2'
            ],
            [
                ['property' => 'value \\\\value2'],
                'property=value \\\\value2'
            ],
            [
                ['property' => 'value \\\\\\\\', 'property2' => 'value2'],
                'property=value \\\\\\\\
property2=value2'
            ],
        ];
    }
}
