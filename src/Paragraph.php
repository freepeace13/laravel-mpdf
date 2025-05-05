<?php

namespace LaravelMpdf;

class Paragraph extends Text
{
    protected $tagName = 'p';

    protected array $tagNames = ['p'];

    public static function make(string $text): static
    {
        return tap(new static, function (Text $node) use ($text) {
            $node->value($text);
        });
    }
}
