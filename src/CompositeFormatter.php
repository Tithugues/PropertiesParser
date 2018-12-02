<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

/**
 * Class CompositeFormatter
 *
 * Allows to apply many formatters on one content.
 */
class CompositeFormatter implements Formatter
{
    /** @var Formatter[] */
    protected $formatters;

    public function addFormatter(Formatter $formatter): self
    {
        $this->formatters[] = $formatter;
        return $this;
    }

    public function format(string $content): string
    {
        foreach ($this->formatters as $formatter) {
            $content = $formatter->format($content);
        }
        return $content;
    }
}