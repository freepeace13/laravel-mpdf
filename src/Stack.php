<?php

namespace LaravelMpdf;

class Stack extends Fragment
{
    public static function horizontal(array $children = []): static
    {
        return new static(['class' => 'x-stack-horizontal'], $children);
    }

    public static function vertical(array $children = []): static
    {
        return new static(['class' => 'x-stack-vertical'], $children);
    }
}
