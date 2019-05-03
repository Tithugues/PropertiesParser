<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

use function preg_replace;

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
        $content = preg_replace('`^(#|!).*$`m', null, $content);
        return $content;
    }
}
