<?php

namespace LaravelMpdf\Support\Components;

use Illuminate\Contracts\View\View;
use LaravelMpdf\Support\Components\Contracts\WithChildren;

abstract class ViewComponent extends Component
{
    abstract public function render(): View;

    public function toHtml(): string
    {
        $view = $this->render();

        $view->with('attributes', $this->attributes);

        if ($this instanceof WithChildren) {
            $view->with('children', $this->getChildren());
        }

        return $view->render();
    }
}
