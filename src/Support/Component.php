<?php

namespace Freepeace\LaravelMpdf\Support;

abstract class Component
{
    protected $children;

    public function __construct($children = [])
    {
        $this->children = $children;
    }

    abstract public function render();

    public function toHtml()
    {
        return $this->render();
    }
}
