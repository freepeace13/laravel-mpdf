<?php

namespace LaravelMpdf;

class Heading extends Text
{
    const SIZE_DISPLAY = 'h1';
    const SIZE_HEADLINE = 'h2';
    const SIZE_TITLE = 'h3';
    const SIZE_LABEL = 'h4';

    protected array $tagNames = ['h1', 'h2', 'h3', 'h4'];

    public static function display(string $text): static
    {
        return static::make($text, self::SIZE_DISPLAY);
    }

    public static function headline(string $text): static
    {
        return static::make($text, self::SIZE_HEADLINE);
    }

    public static function title(string $text): static
    {
        return static::make($text, self::SIZE_TITLE);
    }

    public static function label(string $text): static
    {
        return static::make($text, self::SIZE_LABEL);
    }

    public static function make(string $text, string $tagName): static
    {
        return tap(new static, function (Text $node) use ($text, $tagName) {
            $node->tagName($tagName);
            $node->value($text);
        });
    }
}
