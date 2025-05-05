<?php

namespace LaravelMpdf;

class InvoicePdfGenerator
{
    //

    public static function layout(Layout $layout)
    {
        return $layout
            ->footer([
                'default' => Footer::make('default')
            ])
            ->headers([
                'default' => Header::make('default'),
                'firstPage' => '_blank',
            ])
            ->children([
                Stack::make()
                    ->height(45)
                    ->direction('column')
                    ->children([
                        new InvoiceBillerInfoBlock,
                        new InvoiceCustomerInfoBlock,
                    ]),
                Fragment::make() // spacer
                    ->height(45)
                    ->html('&nbsp;'),
                new InvoiceDetailsTable,
                new InvoiceItemsTable,
                Fragment::make()
                    ->class('items-page-breaker')
                    ->html('&nbsp;'),
                new InvoiceClosingRemarksBlock,
            ]);
    }
}
