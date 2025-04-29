<?php

namespace Freepeace\LaravelMpdf\Views\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public function render()
    {
        return view('laravel-mpdf::components.page-header');
    }
}
