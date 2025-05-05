<?php

namespace LaravelMpdf;

use Illuminate\View\ComponentAttributeBag;
use Illuminate\Support\Str;

abstract class Component
{
    protected ?string $id;

    protected ?string $innerHTML;

    protected ?string $tagName;

    protected array $tagNames = [];

    protected bool $appendsNewLine = false;

    protected $parentComponent;

    protected ComponentAttributeBag $attributes;

    protected array $style = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = new ComponentAttributeBag($attributes);
    }

    public function style(array $style): static
    {
        $this->style = $style;

        return $this;
    }

    public function newLine(bool $appendsNewLine = true): static
    {
        $this->appendsNewLine = $appendsNewLine;

        return $this;
    }

    public function setParentComponent(Component $component): static
    {
        $this->parentComponent = $component;

        return $this;
    }

    public function parentComponent(): ?Component
    {
        return $this->parentComponent;
    }

    public function getId(): string
    {
        return filled($this->id) ? $this->id : Str::uuid();
    }

    protected function mergeAttributes(): array
    {
        return [];
    }

    protected function compileAttributes(): string
    {
        return $this->attributes->merge($this->mergeAttributes())->toHtml();
    }

    /** @return array|string */
    abstract public function render();

    public function tagName(string $tagName): static
    {
        if (!empty($this->tagNames) && ! in_array($tagName, $this->tagNames)) {
            throw new \Exception("Invalid tag name: {$tagName}");
        }

        $this->tagName = $tagName;

        return $this;
    }

    public function innerHtml(string $html): static
    {
        $this->innerHTML = $html;

        return $this;
    }

    public function resolve()
    {
        $html = $this->render();

        if ($this->appendsNewLine) {
            $html .= "<br>";
        }

        return $html;
    }
}
