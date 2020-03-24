<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once('./vendor/dompdf/dompdf/autoload.inc.php');

use Dompdf\Dompdf;


class Pdfgenerator
{
    public function generate($html, $filename = '', $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . '.pdf', array("Attachment" => 0));
    }
}
