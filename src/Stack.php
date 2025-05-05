<?php

namespace LaravelMpdf;

class Stack extends Block
{
    /**
     * @var 'vertical'|'horizontal' $alignment
     */
    protected $alignment = 'vertical';

    protected $width;

    protected $height;

    protected $children = [];

    protected function mergeAttributes(): array
    {
        return [
            'style' => [
                'height: ' . $this->height . 'mm;' => !is_null($this->height),
                'width: ' . $this->width . 'mm;' => !is_null($this->width),
                'clear: both;' => $this->alignment === 'horizontal',
            ]
        ];
    }

    public function alignment(string $value): static
    {
        $this->alignment = $value;

        return $this;
    }

    public function width($width): static
    {
        $this->width = $width;

        return $this;
    }

    public function height($height): static
    {
        $this->height = $height;

        return $this;
    }

    public function render()
    {
        $spacer = str_replace(
            '{{ width }}',
            222, // @todo compute the spacer width according to viewport width, minus margins, minus children width, etc.)
            '<div style="width: {{ width }}mm;">&nbsp;</div>'
        );

        $isHorizontal = $this->alignment === 'horizontal';

        return collect($this->children)->map(function (Component $component) use ($isHorizontal) {
            return $component
                ->setParentComponent($this)
                ->style([
                    'float: left;' => $isHorizontal,
                ])
                ->resolve();
        })->implode($isHorizontal ? $spacer : '');
    }
}
