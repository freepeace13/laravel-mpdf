<?php

namespace LaravelMpdf;

class Image extends Component
{
    protected $tagName = 'img';

    protected array $tagNames = ['img'];

    protected string $alt = '';

    protected string $src;

    protected $width;

    protected $height;

    public function width(int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function height(int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function src(string $src): static
    {
        $this->src = $src;

        return $this;
    }

    public function alt(string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    protected function mergeAttributes(): array
    {
        return [
            'alt' => $this->alt,
            'src' => $this->src,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }

    public function render(): string
    {
        $template = '<img {{ attributes }} />';

        return str_replace(
            '{{ attributes }}',
            $this->compileAttributes(),
            $template
        );
    }
}
