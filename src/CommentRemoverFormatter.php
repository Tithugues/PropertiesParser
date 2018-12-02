<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

/**
 * Class CommentRemoverFormatter
 *
 * Remove commented lines
 */
class CommentRemoverFormatter implements Formatter
{
    public function format($content): string
    {
        $content = \preg_replace('`^ *(!|;).*$`m', null, $content);
        $content = \preg_replace('`\n{2,}`', "\n", $content);
        $content = \trim($content);
        return $content;
    }
}
