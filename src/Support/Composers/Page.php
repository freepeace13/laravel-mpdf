<?php

namespace LaravelMpdf\Support\Composers;

class Page
{
    protected string $name;

    protected array $blocks = [];

    public function __construct(string $name, array $blocks = [])
    {
        $this->name = $name;
        $this->blocks = $blocks;
    }

    public static function make(string $name, array $blocks = []): static
    {
        return new static($name, $blocks);
    }

    public function blocks(array $blocks): static
    {
        $this->blocks = $blocks;

        return $this;
    }

    public function render(): string
    {
        return array_reduce($this->blocks, function ($carry, $block) {
            $carry .= $block->render() . '\\n';
            return $carry;
        }, '');
    }
}
