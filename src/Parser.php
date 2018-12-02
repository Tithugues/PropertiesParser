<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

class Parser
{
    /** @var Formatter */
    protected $formatter;

    /** @var Extractor */
    protected $extractor;

    /** @var string */
    protected $content;

    public function __construct(Formatter $formatter = null, Extractor $extractor = null)
    {
        if (null === $formatter) {
            $formatter = new CompositeFormatter();
            $formatter->addFormatter(new CommentRemoverFormatter())
                ->addFormatter(new OnelineFormatter());
        }
        if (null === $extractor) {
            $extractor = new Extractor();
        }

        $this->formatter = $formatter;
        $this->extractor = $extractor;
    }

    public function parse(string $content)
    {
        $content = $this->formatter->format($content);

        //Extract keys and values
        return $this->extractor->extract($content);
    }
}
