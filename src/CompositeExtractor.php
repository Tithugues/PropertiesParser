<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

/**
 * Class CompositeExtractor
 *
 * Allows to apply many extractors on one content.
 */
class CompositeExtractor implements Extractor
{
    /** @var Extractor[] */
    protected $extractors;

    /**
     * Add an extractor
     *
     * All extractors will be handled in the order they were added
     *
     * @param Extractor $extractor
     * @return CompositeExtractor
     */
    public function addExtractor(Extractor $extractor): self
    {
        $this->extractors[] = $extractor;
        return $this;
    }

    /**
     * Format the content
     * @param string $content Content to format
     * @return array List of properties/values extracted
     */
    public function extract(string $content): array
    {
        $lines = \explode(\PHP_EOL, $content);

        $properties = [];

        foreach ($lines as $line) {
            foreach ($this->extractors as $formatter) {
                if (!empty($currentProperties = $formatter->extract($line))) {
                    $properties = \array_merge($properties, $currentProperties);
                    break;
                }
            }
        }

        return $properties;
    }
}
