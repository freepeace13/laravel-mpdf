<?php

namespace LaravelMpdf;

class InvoiceDetailsTable extends Table
{
    public function render()
    {
        return [
            TableRow::make()
                ->children([
                    TableColumn::make()
                        ->children([
                            Text::make()
                                ->bold()
                                ->value('Invoice:'),
                            Text::make()
                                ->value('invoice-number')
                        ]),
                    TableColumn::make()
                        ->class('text-center')
                        ->children([
                            Text::make()
                                ->bold()
                                ->value('Order No.:'),
                            Text::make()
                                ->value('order-number')
                        ]),
                    TableColumn::make()
                        ->class('text-right')
                        ->children([
                            Text::make()
                                ->bold()
                                ->value('Date:'),
                            Text::make()
                                ->value('order-date')
                        ])
                ]),
            TableRow::make() // Spacer
                ->children([
                    TableColumn::make()
                        ->colspan(3)
                        ->html('&nbsp;')
                ]),
            TableRow::make()
                ->children([
                    TableColumn::make()
                        ->colspan(3)
                        ->children([
                            Text::make()
                                ->bold()
                                ->value('Construction Site:'),
                            Text::make()
                                ->value('construction-site')
                        ])
                ]),
            TableRow::make()
                ->children([
                    TableColumn::make()
                        ->colspan(3)
                        ->children([
                            Text::make()
                                ->bold()
                                ->value('Execution Period:'),
                            Text::make()
                                ->value('execution-period')
                        ])
                ]),
            TableRow::make()
                ->children([
                    TableColumn::make()
                        ->colspan(3)
                        ->children([
                            Text::make()
                                ->bold()
                                ->value('Service Recipient:'),
                            Text::make()
                                ->value('service-recipient')
                        ])
                ]),
            TableRow::make() // Spacer
                ->children([
                    TableColumn::make()
                        ->colspan(3)
                        ->html('&nbsp;')
                ]),
            TableRow::make()
                ->children([
                    TableColumn::make()
                        ->colspan(3)
                        ->children([
                            Text::make()
                                ->bold()
                                ->value('Subject line')
                        ])
                ]),
            TableRow::make()
                ->children([
                    TableColumn::make()
                        ->colspan(3)
                        ->html('Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam rem doloribus repellendus, provident aliquid ea. Iusto doloribus ut eveniet nihil tempora voluptates voluptatum, voluptas ex eum eaque numquam quibusdam explicabo?')
                ]),
            TableRow::make() // Spacer
                ->children([
                    TableColumn::make()
                        ->colspan(3)
                        ->html('&nbsp;')
                ]),
        ];
    }
}
