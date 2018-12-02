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
        $content = (new CommentRemover())->removeComment($content);

        //Concat multilines
        $content = (new Inliner())->inline($content);

        //Extract keys and values
        return (new Extractor())->extract($content);
    }
}
