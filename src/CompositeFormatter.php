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

    /**
     * Add a formatter
     *
     * All formatters will be handled in the order they were added
     *
     * @param Formatter $formatter
     * @return CompositeFormatter
     */
    public function addFormatter(Formatter $formatter): self
    {
        $this->formatters[] = $formatter;
        return $this;
    }

    /**
     * Format the content
     * @param string $content Content to format
     * @return string Formatted content
     */
    public function format(string $content): string
    {
        foreach ($this->formatters as $formatter) {
            $content = $formatter->format($content);
        }
        return $content;
    }
}
