<?php

namespace LaravelMpdf\Components;

use Illuminate\Contracts\View\View;
use LaravelMpdf\Support\Components\ViewComponent;

class Text extends ViewComponent
{
    public string $tag = 'p';

    public static function make(string $tag = 'span', array $attributes = []): static
    {
        $component = new static($attributes);

        $component->tag = $tag;

        return $component;
    }

    public function render(): View
    {
        return view('laravel-mpdf::components.text', [
            'tag' => $this->tag,
            'value' => $this->attributes->get('value')
        ]);
    }
}
