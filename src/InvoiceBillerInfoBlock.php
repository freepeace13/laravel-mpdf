<?php

namespace LaravelMpdf;

class InvoiceBillerInfoBlock extends Fragment
{
    protected $maxWidth = 75;

    protected $maxHeight = 45;

    protected $style = 'padding-top: 5mm;';

    public function render()
    {
        return [
            Fragment::make()
                ->class('text-center')
                ->children([
                    Image::make()
                        ->style('border: 1px solid #ccc;')
                        ->height(22)
                        ->src('https://via.placeholder.com/22')
                ]),
            Fragment::make()
                ->id('biller')
                ->children([
                    Heading::h2('asdasdsad'),
                    Text::make()
                        ->value('biller address')
                        ->newLine(),
                    Link::make()
                        ->href('https://www.google.com')
                        ->text('website'),
                    Link::make()
                        ->href('mailto:asdasd@asdasd.com')
                        ->text('asdasd@asdasd.com'),
                ])
        ];
    }
}
