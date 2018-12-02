<?php
declare(strict_types=1);

use hpeccatte\PropertiesParser\Extractor;
use PHPUnit\Framework\TestCase;

class InlinerTest extends TestCase
{
    /**
     * @dataProvider inliningProvider
     *
     * @param string $expected Content inlined
     * @param string $content Content multilined
     */
    public function testInline(string $expected, string $content)
    {
        $inliner = new Extractor();
        $variables = $inliner->inline($content);
        $this::assertEquals($expected, $variables);
    }

    public function inliningProvider()
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
