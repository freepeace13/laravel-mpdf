<?php

namespace LaravelMpdf\Components;

use Illuminate\Contracts\View\View;
use LaravelMpdf\Concerns\HasChildren;
use LaravelMpdf\Support\Components\Contracts\WithChildren;
use LaravelMpdf\Support\Components\ViewComponent;

class GridColumn extends ViewComponent implements WithChildren
{
    use HasChildren;

    public function __construct(array $children = [])
    {
        parent::__construct(['class' => 'x-grid-column']);

        $this->setChildren($children);
    }

    public function render(): View
    {
        return view('laravel-mpdf::components.wrapper');
    }
}
