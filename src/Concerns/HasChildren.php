<?php

namespace LaravelMpdf\Concerns;

use Illuminate\Support\Collection;

trait HasChildren
{
    public array $children = [];

    public function setChildren(array $children): static
    {
        $this->children = $children;

        return $this;
    }

    public function getChildren(): Collection
    {
        return collect($this->children);
    }

    public function compileChildren(): string
    {
        return array_reduce($this->children, function ($carry, $child) {
            return $carry . $child->toHtml() . '\\n';
        }, '');
    }
}
