<?php

namespace LaravelMpdf;

abstract class Block extends Component
{
    protected array $tagNames = [
        'div',
        'section',
        'article',
        'main',
        'header'
    ];
}
