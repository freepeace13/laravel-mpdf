<?php

namespace App\Console\Commands;

use DOMDocument;
use DOMXPath;
use Illuminate\Console\Command;

class DOMDocumentExperiment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $document = new DOMDocument();
        $document->preserveWhiteSpace = true;
        $document->formatOutput = true;

        $document->loadHTML('
        <html lang="en">
            <head>
                <title>Test</title>
                <meta charset="UTF-8">

                <style>
                    .x-row {
                        clear: both;
                    }
                </style>
            </head>
            <body>
                <div class="x-row">
                    <div class="x-col">content</div>
                    <div class="x-col">content</div>
                </div>
            </body>
        </html>');

        $xpath = new DOMXPath($document);

        $body = $xpath->query('/html/body/div');
        $head = $xpath->query('/html/head');
        $style = $xpath->query('.//style', $head->item(0))->item(0);

        $css = trim($style->nodeValue);

        $css = preg_replace(
            '/(\.x-row\s*\{[^}]*)(\})/',
            "$1 background: red;\n$2",
            $css
        );

        $css = implode("\n", array_map(fn($line) => preg_replace('/^\s+/', '    ', $line), explode("\n", $css)));

        $style->nodeValue = $css;

        dd(iterator_to_array($body->item(0)->attributes), iterator_to_array($style->childNodes));

        $head = $document->getElementsByTagName('head')->item(0);
        $stylesheet = $head->getElementsByTagName('style')->item(0);
        dd([
            'body' => $body,
            'head' => $head,
            'stylesheet' => $stylesheet,
            'content' => collect($body->childNodes)->map(fn ($node) => [
                'tagName' => $node->textContent,
                // 'attributes' => iterator_to_array($node->attributes),
                // 'textContent' => $node->textContent,
            ]),
            'html' => $document->saveHTML(),
        ]);
        return 0;
    }
}
