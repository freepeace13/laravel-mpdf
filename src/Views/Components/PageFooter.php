<?php

namespace Freepeace\LaravelMpdf\Views\Components\Layouts;

use Illuminate\View\Component;

class PageFooter extends Component
{
    public function render()
    {
        return view('laravel-mpdf::components.page-footer');
    }
}
