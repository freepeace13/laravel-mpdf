<?php

namespace LaravelMpdf;

class Link extends Text
{
    protected $tagName = 'a';

    protected array $tagNames = ['a'];

    protected string $href;

    public static function make(string $href, string $text): static
    {
        return tap(new static, function (Link $node) use ($href, $text) {
            $node
                ->href($href)
                ->underline(true)
                ->text($text);
        });
    }

    public function text(string $text): static
    {
        return $this->innerHtml($text);
    }

    public function href(string $href): static
    {
        $this->href = $href;

        return $this;
    }
}
