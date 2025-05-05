<?php

namespace LaravelMpdf\Support\Html;

class Css
{
    protected $className;

    protected $classStyles = [];

    public function __construct(string $className, array $classStyles = [])
    {
        $this->className = $className;
        $this->classStyles = $classStyles;
    }

    public function setValue(string $css, $value): self
    {
        $this->classStyles[$css] = $value;

        return $this;
    }

    public function getValue(string $css)
    {
        return $this->classStyles[$css] ?? null;
    }

    public function is($css): bool
    {
        if ($css instanceof self) {
            $css = $css->className;
        }

        if (is_string($css)) {
            return $this->className === $css;
        }

        return false;
    }

    public static function toCssStyle(array $styles): string
    {
        return implode(";\n", array_map('trim', $styles));
    }

    public function __toString(): string
    {
        return sprintf("%s {\n%s}", $this->className, self::toCssStyle($this->classStyles));
    }
}
