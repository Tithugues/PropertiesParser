<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

/**
 * Extractor of properties / values from a content
 */
class PropertyWithValueExtractor implements Extractor
{
    /**
     * Extract the properties / values
     * @param string $content Content to parse
     * @return array Properties found and their values
     */
    public function extract(string $content): array
    {
        \preg_match_all(
            '`^(?P<property>.*)(?:(?<!\\\\) [=:]|(?<!\\\\) |(?<!\\\\):|(?<!\\\\)=)(?P<value>.*)$`Um',
            $content,
            $matches,
            \PREG_SET_ORDER
        );

        $properties = \array_column($matches, 'property');
        $values = \array_column($matches, 'value');
        \array_walk(
            $properties,
            function (&$value) {
                $value = \stripslashes(\ltrim($value));
            }
        );
        \array_walk(
            $values,
            function (&$value) {
                $value = \trim($value);
            }
        );

        return \array_combine($properties, $values);
    }
}
