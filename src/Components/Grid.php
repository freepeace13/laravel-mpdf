<?php

namespace LaravelMpdf\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use LaravelMpdf\Concerns\HasChildren;
use LaravelMpdf\Support\Components\Contracts\WithChildren;
use LaravelMpdf\Support\Components\ViewComponent;

class Grid extends ViewComponent implements WithChildren
{
    use HasChildren;

    public function __construct(array $children = [])
    {
        parent::__construct(['class' => 'x-grid']);

        $this->setChildren($children);
    }

    public function setChildren(array $children): static
    {
        $length = count($children) - 1;
        $childComponents = [];
        foreach ($children as $key => $child) {
            if ($length == $key) {
                $child->attributes->setAttributes(
                    $child->attributes->merge(['style' => 'margin-left: 30mm;'])->getAttributes()
                );
            }
            $childComponents[] = $child;
        }

        $this->children = $childComponents;

        return $this;
    }

    public function render(): View
    {
        return view('laravel-mpdf::components.wrapper');
    }
}
