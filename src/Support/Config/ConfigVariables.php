<?php

namespace Mpdf\Config;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Mpdf\Css\DefaultCss;

class ConfigVariables implements Arrayable, ArrayAccess
{
    protected $config = [];

    private static $configurable = [
        'debug',
        'allow_output_buffering',
        'show_image_errors',
        'margin_buffer',
        'page_num_suffix',
        'page_num_prefix',
        'restrict_color_space',
        'pdfx',
        'auto_pdfx',
        'pdfa',
        'auto_pdfa',
    ];

    private static $customKeys = [
        'show_image_errors' => 'showImageErrors',
        'margin_buffer' => 'margBuffer',
        'page_num_suffix' => 'pageNumSuffix',
        'page_num_prefix' => 'pageNumPrefix',
        'restrict_color_space' => 'restrictColorSpace',
        'pdfx' => 'PDFX',
        'auto_pdfx' => 'PDFXauto',
        'pdfa' => 'PDFA',
        'auto_pdfa' => 'PDFAauto',
    ];

    public function __construct(array $config = [])
    {
        $sanitizedConfig = Arr::only($config, self::$configurable);

        foreach ($sanitizedConfig as $key => $value) {
            $this->config[self::$customKeys[$key] ?? $key] = $value;
        }
    }

    /** @see \Mpdf\Config\ConfigVariables */
    public function getDefaults(): array
    {
        return [
            'debug' => false,
            'aliasNbPg' => '{PAGECOUNT}',
            'aliasNbPgGp' => '{PAGEGROUPCOUNT}',
            'allow_output_buffering' => true,
            'collapseBlockMargins' => true,
            'dpi' => 96,
            'img_dpi' => 96,
            // The value should be always zero if either PDFX or PDFXauto is true
            'restrictColorSpace' => 0,
            'PDFX' => false,
            'PDFXauto' => true,
            'PDFA' => false,
            'PDFAauto' => true,
            'simpleTables' => true,
            'use_kwt' => true, // for invoice items summary
            'justifyB4br' => true,
            'tabSpaces' => 4,
            'smCapsScale' => 0.80,
            'smCapsStretch' => 115,
            'autoPadding' => true,
            // 'defaultCSS' => DefaultCss::$definition,
            // 'defaultCssFile' => __DIR__ . '/../../data/mpdf.css',
            'pdf_version' => '1.4',
            'cacheCleanupInterval' => 3600
        ];
    }

    public function get($key = null)
    {
        $mergedConfig = array_merge($this->getDefaults(), $this->config);

        if (is_null($key)) {
            return $mergedConfig;
        }

        return $mergedConfig[$key] ?? null;
    }

    public function all(): array
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return $this->get();
    }

    public function offsetExists($offset): bool
    {
        return isset($this->config[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value): void
    {
        //
    }

    public function offsetUnset($offset): void
    {
        //
    }
}
