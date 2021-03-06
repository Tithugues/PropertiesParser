<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

/**
 * Extractor of properties
 */
interface Extractor
{
    /**
     * Extract properties/values of a content
     * @param string $content Content that contains the data to extract
     * @return array Extracted properties/values
     */
    public function extract(string $content): array;
}
