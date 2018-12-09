<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

/**
 * Class EmptyLineRemoverFormatter
 *
 * Remove commented lines
 */
class EmptyLineRemoverFormatter implements Formatter
{
    /**
     * @param string $content Content to format
     * @return string Content formatted
     */
    public function format(string $content): string
    {
        $content = \preg_replace('`\n{2,}`', "\n", $content);
        $content = \rtrim($content);
        return $content;
    }
}
