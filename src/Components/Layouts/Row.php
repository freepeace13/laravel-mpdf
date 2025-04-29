<?php

namespace Freepeace\LaravelMpdf\Components\Layouts;

use Freepeace\LaravelMpdf\Support\Component;

class Row extends Component
{
    public static function make(array $columns): self
    {
        return new self($columns);
    }
}
