<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

/**
 * Class OneLineFormatter
 *
 * Replace multilines values by one-line values
 */
class OneLineFormatter implements Formatter
{
    public function format(string $content): string
    {
        \preg_match_all('`(?<!\\\\)(?:\\\\\\\\)*\\\\\R`', $content, $matches, \PREG_SET_ORDER | \PREG_OFFSET_CAPTURE);
        $matches = \array_reverse($matches);
        foreach ($matches as $match) {
            //Because $match[0][0] can be longer than 2 characters (when escaped backslashes before the escaped line
            // break), we need to find the line break character position.
            $positionLineBreak = $match[0][1] + \strlen($match[0][0]) - 1;
            $content = \substr($content, 0, $positionLineBreak-1) . \ltrim(\substr($content, $positionLineBreak + 1));
        }
        return $content;
    }
}
