<?php

return [
    'debug' => true,

    'mode' => 'utf-8',

    'allow_output_buffering' => true,

    'format' => 'A4',

    'formats' => [
        'A4' => [
            'format' => 'A4',
            'orientation' => 'P',
            'size' => [210, 297],
        ],

        'A4-L' => [
            'format' => 'A4',
            'orientation' => 'L',
            'size' => [297, 210],
        ],

        'A3' => [
            'format' => 'A3',
            'orientation' => 'P',
            'size' => [297, 420],
        ],

        'A3-L' => [
            'format' => 'A3',
            'orientation' => 'L',
            'size' => [420, 297],
        ],
    ],

    'theme' => 'default',

    'themes' => [
        'default' => [
            'font-family' => 'sans-serif',
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-top' => 0,
            'margin-bottom' => 0,
            'margin-header' => 0,
            'margin-footer' => 0,
        ],
    ],
];
