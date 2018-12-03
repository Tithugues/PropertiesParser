<?php
declare(strict_types=1);

use hpeccatte\PropertiesParser\CommentRemoverFormatter;
use PHPUnit\Framework\TestCase;

class CommentRemoverFormatterTest extends TestCase
{
    /**
     * @dataProvider formatProvider
     *
     * @param string $expected
     * @param string $content
     */
    public function testFormat(string $expected, string $content): void
    {
        $formatter = new CommentRemoverFormatter();
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
!Comment
key2=value2',
            ],
            [
                'key=value
key2=value2',
                'key=value
;Comment
key2=value2',
            ],
            [
                'key=value
key2=value2',
                'key=value
!Comment
;Comment
key2=value2',
            ],
            [
                'key=value
key2=value2',
                '!Comment
key=value
!Comment
!Comment;Comment
key2=value2
',
            ],
        ];
    }
}
