<?php

namespace LaravelMpdf;

class Heading extends Text
{
    const DISPLAY = 'h1';
    const HEADLINE = 'h2';
    const TITLE = 'h3';

    public static function h1(string $text): static
    {
        return new static($text, self::DISPLAY);
    }
}
