<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

use function array_column;
use function array_combine;
use function array_walk;
use function ltrim;
use function preg_match_all;
use const PREG_SET_ORDER;
use function stripslashes;

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
        //(?P<property>.*) => look for the property name
        //(?:(?<!\\\\) [=:]|(?<!\\\\) |(?<!\\\\):|(?<!\\\\)=) => look for the separator
        //(?P<value>.*) => look for the value
        preg_match_all(
            '`^(?P<property>.*)(?:(?<!\\\\) [=:]|(?<!\\\\) |(?<!\\\\):|(?<!\\\\)=)(?P<value>.*)$`Um',
            $content,
            $matches,
            PREG_SET_ORDER
        );

        $properties = array_column($matches, 'property');
        $values = array_column($matches, 'value');
        array_walk(
            $properties,
            static function (&$value) {
                $value = stripslashes(ltrim($value));
            }
        );
        array_walk(
            $values,
            static function (&$value) {
                $value = \trim($value);
            }
        );

        return array_combine($properties, $values);
    }
}
