<?php

namespace LaravelMpdf;

class InvoiceCustomerInfoBlock extends Fragment
{
    protected $maxWidth = 85;

    protected $maxHeight = 45;

    public function render()
    {
        return [
            Fragment::make()
                ->id('return-address')
                ->height(5)
                ->children([
                    Text::make()
                        ->fontSize(6)
                        ->italize()
                        ->value('asjdklasjdl kasjdl')
                ]),
            Fragment::make()
                ->id('additional-note')
                ->height(12.7)
                ->children([
                    Heading::h1('note')
                ]),
            Fragment::make()
                ->id('recipient')
                ->height(27.3)
                ->children([
                    Text::make()
                        ->bold()
                        ->value('name'),
                    Fragment::newLine(),
                    Text::make()
                        ->value('address')
                ])
        ];
    }
}
