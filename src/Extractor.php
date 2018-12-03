<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

class Extractor
{
    public function extract(string $content): array
    {
        \preg_match_all(
            '`^(?P<key>.*)(?:(?<!\\\\) [=:]|(?<!\\\\) |(?<!\\\\):|(?<!\\\\)=)(?P<value>.*)$`Um',
            $content,
            $matches,
            \PREG_SET_ORDER
        );

        //$keys = array_map(
        //    function($match) {
        //        return $match['key'];
        //    },
        //    $matches
        //);
        $keys = \array_column($matches, 'key');
        $values = \array_column($matches, 'value');
        \array_walk($keys, function(&$value) { $value = \ltrim($value); });
        \array_walk($values, function(&$value) { $value = \trim($value); });

        return \array_combine($keys, $values);
    }
}
