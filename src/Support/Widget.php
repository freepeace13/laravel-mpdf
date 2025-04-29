<?php

namespace Freepeace\LaravelMpdf\Support;

class Widget extends Component
{
    protected string $widgetName;

    protected array $data;

    public function __construct(string $widgetName, array $data = [])
    {
        $this->widgetName = $widgetName;
        $this->data = $data;
    }

    public function render(): string
    {
        return '';
    }
}
