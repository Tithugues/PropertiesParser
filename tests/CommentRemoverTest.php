<?php
declare(strict_types=1);

use hpeccatte\PropertiesParser\CommentRemover;
use PHPUnit\Framework\TestCase;

class CommentRemoverTest extends TestCase
{
    /**
     * @dataProvider commentRemovingProvider
     *
     * @param string $expected
     * @param string $content
     */
    public function testRemoveComment(string $expected, string $content)
    {
        $commentRemover = new CommentRemover();
        $variables = $commentRemover->removeComment($content);
        $this::assertEquals($expected, $variables);
    }

    public function commentRemovingProvider()
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
