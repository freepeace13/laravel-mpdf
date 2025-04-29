<?php

namespace Freepeace\LaravelMpdf;

use Mpdf\Mpdf;

class PdfGenerator
{
    public function generate($html)
    {
        $mpdf = new Mpdf([
            'debug' => true,
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
            'allow_output_buffering' => true,
        ]);

        $mpdf->WriteHTML($html);
        $mpdf->Output('document.pdf', 'D'); // Output the PDF to the browser
    }
}
