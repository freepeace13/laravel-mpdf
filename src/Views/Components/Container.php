<?php

namespace Freepeace\LaravelMpdf\Views\Components;

use Closure;
use Illuminate\View\Component;

class Container extends Component
{
    public function __construct(
        public string $class,
        public array $children = [],
    ) {
        //
    }

    public function render(): Closure
    {
        return function (array $data) {
            // $data['componentName'];
            // $data['attributes'];
            // $data['slot'];
            return view('laravel-mpdf::components.containers.container');
        };
    }
}
