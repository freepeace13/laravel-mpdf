<?php

namespace Freepeace\LaravelMpdf\Components;

use Freepeace\LaravelMpdf\Support\Component;

class Page extends Component
{
    public static function make(array $children): self
    {
        return new self($children);
    }
}
