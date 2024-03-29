<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

use function preg_replace;
use function rtrim;

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
        return rtrim(preg_replace('`\n{2,}`', "\n", $content));
    }
}
