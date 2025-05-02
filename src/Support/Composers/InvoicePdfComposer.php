<?php

namespace LaravelMpdf\Support\Composers;

class InvoicePdfComposer extends Composer
{
    public function compose(): array
    {
        return [
            Page::make('invoice')
                ->blocks([]),
        ];
    }
}
