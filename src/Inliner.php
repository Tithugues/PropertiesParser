<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

class Inliner
{
    public function inline(string $content): string
    {
        \preg_match_all('`(?<!\\\\)(?:\\\\\\\\)*\\\\\R`', $content, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);
        $matches = \array_reverse($matches);
        foreach ($matches as $match) {
            $positionLineBreak = strpos($content, "\n", $match[0][1]-1);
            $content = \substr($content, 0, $positionLineBreak-1) . ltrim(substr($content, $positionLineBreak + 1));
        }
        return $content;
    }
}
