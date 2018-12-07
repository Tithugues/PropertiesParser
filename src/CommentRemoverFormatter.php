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
    /**
     * @param string $content Content to format
     * @return string Content formatted
     */
    public function format(string $content): string
    {
        $content = \preg_replace('`^ *(!|;).*$`m', null, $content);
        $content = \preg_replace('`\n{2,}`', "\n", $content);
        $content = \trim($content);
        return $content;
    }
}
