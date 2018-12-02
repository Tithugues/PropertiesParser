<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

class CommentRemover
{
    public function removeComment($content): string
    {
        $content = \preg_replace('`^ *(!|;).*$`m', null, $content);
        $content = \preg_replace('`\n{2,}`', "\n", $content);
        $content = \trim($content);
        return $content;
    }
}
