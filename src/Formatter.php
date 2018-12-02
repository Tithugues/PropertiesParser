<?php
declare(strict_types=1);

namespace hpeccatte\PropertiesParser;

interface Formatter
{
    /**
     * Format the content
     * @param string $content Non formatted content
     * @return string Formatted content
     */
    public function format(string $content): string;
}