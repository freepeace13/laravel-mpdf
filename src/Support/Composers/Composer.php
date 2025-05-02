<?php

namespace LaravelMpdf\Support\Composers;

abstract class Composer
{
    protected string $layout = 'laravel-mpdf::base';

    abstract public function compose(): array;

    public function render()
    {
        return view('laravel-mpdf::compose', $this->withData());
    }

    protected function withData()
    {
        $content = array_map(fn (Page $page) => $page->render(), $this->compose());

        return [
            'content' => $content,
        ];
    }
}
