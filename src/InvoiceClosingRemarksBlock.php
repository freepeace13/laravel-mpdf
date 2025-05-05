<?php

namespace LaravelMpdf;

class InvoiceClosingRemarksBlock extends Fragment
{
    protected $class = 'closing-remarks';

    public function render()
    {
        return [
            Paragraph::make()
                ->children([
                    Text::make()
                        ->bold()
                        ->value('Payment Date: '),
                    Text::make()
                        ->value('payment-date')
                ]),
            Paragraph::make()
                ->children([
                    Text::make()
                        ->bold()
                        ->value('The sum of all wage costs is: '),
                    Text::make()
                        ->value('sum of wage')
                ]),
            Paragraph::make()
                ->children([
                    Text::make()
                        ->bold()
                        ->value('Note: '),
                    Text::make()
                        ->value('lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.')
                ]),
        ];
    }
}
