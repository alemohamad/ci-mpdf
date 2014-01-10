<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('exportMeAsMPDF'))
{
    function exportMeAsMPDF($fileName, $htmlView, $css = '', $orientation = 'P', $zoom = 'fullpage') {
        $CI =& get_instance();
        $CI->load->library('mpdf57/mpdf');
        // mpdf documentation: http://mpdf1.com/manual/index.php?tid=184
        $CI->mpdf->AddPage($orientation, // L - landscape, P - portrait
                    'A4', '', '', '',
                    12, // margin_left
                    12, // margin right
                    10, // margin top
                    10, // margin bottom
                    5, // margin header
                    5); // margin footer
        if( !empty($css) ) {
            $CI->mpdf->WriteHTML($css, 1);
        }
        $CI->mpdf->WriteHTML($htmlView, 2);
        $CI->mpdf->SetDisplayMode($zoom); // default, fullpage, fullwidth, real, 0-100
        $CI->mpdf->Output($fileName . '.pdf','D'); // D - Force download, I - View in explorer
    }
}

/* End of file pdfexport_helper.php */
/* Location: ./application/helpers/pdfexport_helper.php */