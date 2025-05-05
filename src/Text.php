<?php

namespace LaravelMpdf;

class Text extends Component
{
    protected $tagName = 'span';

    protected bool $isBold = false;

    protected bool $isItalic = false;

    protected bool $isUnderlined = false;

    protected array $tagNames = [
        'span',
        'b',
        'i',
        'u',
        'big',
        'small',
        'strong',
        'em'
    ];

    protected function mergeAttributes(): array
    {
        return [
            'style' => [
                'font-weight: bold;' => $this->isBold,
                'font-style: italic;' => $this->isItalic,
                'text-decoration: underline;' => $this->isUnderlined,
            ]
        ];
    }

    public function value(string $value): static
    {
        return $this->innerHtml($value);
    }

    public function bold(bool $isBold = true): static
    {
        $this->isBold = $isBold;

        return $this;
    }

    public function italic(bool $isItalic = true): static
    {
        $this->isItalic = $isItalic;

        return $this;
    }

    public function underline(bool $isUnderlined = true): static
    {
        $this->isUnderlined = $isUnderlined;

        return $this;
    }

    public function render()
    {
        $template = '<{{ tagName }} {{ attributes }}>{{ children }}</{{ tagName }}>';

        return str_replace(
            [
                '{{ tagName }}',
                '{{ attributes }}',
                '{{ children }}',
            ],
            [
                $this->tagName,
                $this->compileAttributes(),
                $this->innerHTML,
            ],
            $template
        );
    }
}
