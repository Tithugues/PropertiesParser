<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

use function array_fill_keys;
use function explode;
use const PHP_EOL;

/**
 * Extractor of properties without value
 */
class NoValueExtractor implements Extractor
{
    /**
     * Extract properties/values of a content
     * @param string $content Content that contains the data to extract
     * @return array Extracted properties/values
     */
    public function extract(string $content): array
    {
        $properties = explode(PHP_EOL, $content);
        return array_fill_keys($properties, null);
    }
}
