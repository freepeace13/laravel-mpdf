<?php

return [
    'debug' => env('LARAVEL_MPDF_DEBUG', false),

    'mode' => 'utf-8',

    'allow_output_buffering' => true,

    'temp_dir' => env('LARAVEL_MPDF_TEMP_DIR', sys_get_temp_dir()),

    'format' => env('LARAVEL_MPDF_FORMAT', 'A4'),

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

    'composers' => [
        // Register composer classes here that extends Freepeace\Support\Composer
        // Composers defined formats and configuration intended for specific purpose
        // For example, you can define a composer for a specific report or invoice
    ],
];
