<?php

namespace LaravelMpdf\Views\Components\Tables;

use Illuminate\View\Component;

class Table extends Component
{
    public function render()
    {
        return view('laravel-mpdf::components.tables.table');
    }
}
