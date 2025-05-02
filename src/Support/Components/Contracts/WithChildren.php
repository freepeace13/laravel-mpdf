<?php

namespace LaravelMpdf\Support\Components\Contracts;

use Illuminate\Support\Collection;

interface WithChildren
{
    public function setChildren(array $children): static;

    public function getChildren(): Collection;

    public function compileChildren(): string;
}
