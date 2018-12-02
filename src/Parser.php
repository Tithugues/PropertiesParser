<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

class Parser
{
    /** @var string */
    protected $content;

    public function parse(string $content)
    {
        //Remove comment lines
        $content = (new CommentRemoverFormatter())->format($content);

        //Concat multilines
        $content = (new OnelineFormatter())->format($content);

        //Extract keys and values
        return (new Extractor())->extract($content);
    }
}
