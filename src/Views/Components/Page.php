<?php

namespace LaravelMpdf\Views\Components;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

class Page extends Component
{
    public function render()
    {
        return view('laravel-mpdf::components.page');
    }
}
