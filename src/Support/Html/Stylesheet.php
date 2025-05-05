<?php

namespace LaravelMpdf\Support\Html;

use DOMNode;
use DOMXPath;

class Stylesheet
{
    protected array $children = [];

    public function __construct(array $children = [])
    {
        $this->children = $children;
    }

    public static function make(string $content = ''): self
    {
        return new static(array_map(
            fn($line) => new Css($line),
            explode("\n", trim($content))
        ));
    }

    public function first($css)
    {
        return collect($this->children)->first(function (Css $child) use ($css) {
            return $child->is($css);
        });
    }
}
