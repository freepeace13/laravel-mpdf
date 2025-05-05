<?php

namespace LaravelMpdf\Support\Components;

use Illuminate\Contracts\View\View;
use LaravelMpdf\Support\Components\Contracts\WithChildren;

/**
 *
 * @see Illuminate\Views\Component
 */
abstract class ViewComponent extends Component
{
    abstract public function render(): View;

    public function toHtml(): string
    {
        return $this->render()->render();
    }
}
