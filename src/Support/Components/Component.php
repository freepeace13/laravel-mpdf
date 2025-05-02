<?php

namespace LaravelMpdf\Support\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\ComponentAttributeBag;
use Stringable;

abstract class Component implements Htmlable, Stringable
{
    /** @var ComponentAttributeBag */
    public $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = new ComponentAttributeBag($attributes);
    }

    public function __toString(): string
    {
        return $this->toHtml();
    }
}
