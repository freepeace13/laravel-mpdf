<?php

namespace LaravelMpdf\Support\Html;

use DOMXPath;
use DOMDocument;

class HtmlDocument
{
    protected $document;

    protected $xpath;

    protected $stylesheet;

    public function __construct(DOMDocument $document)
    {
        $this->document = $document;
        $this->xpath = new DOMXPath($this->document);

        $this->initStyle();
    }

    protected function initStyle()
    {
        $this->stylesheet = Stylesheet::make(
            $this->xpath->query('/html/head/style')->item(0)->nodeValue
        );
    }

    public static function make(string $html): self
    {
        return new static(tap(new DOMDocument(), function ($document) use ($html) {
            $document->loadHTML($html);
        }));
    }
}
