<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('exportMeAsMPDF'))
{
    function exportMeAsMPDF($htmView, $fileName) {
        $CI =& get_instance();
        $CI->load->library('mpdf54/mpdf');
        // $CI->mpdf=new mPDF('c','A4','','',32,25,27,25,16,13);
        $CI->mpdf->AliasNbPages('[pagetotal]');
        $CI->mpdf->SetHTMLHeader('{PAGENO}/{nb}', '1', true);
        $CI->mpdf->SetDisplayMode('fullpage');
        $CI->mpdf->pagenumPrefix = 'Page number ';
        $CI->mpdf->pagenumSuffix = ' - ';
        $CI->mpdf->nbpgPrefix = ' out of ';
        $CI->mpdf->nbpgSuffix = ' pages';
        $CI->mpdf->SetHeader('{PAGENO}{nbpg}');
        $CI->mpdf = new mPDF('', 'A4', 0, '', 12, 12, 10, 10, 5, 5);
        $style = base_url().'/source/template/css/stylesheet.css';
        $stylesheet = file_get_contents($style);
        $CI->mpdf->WriteHTML($stylesheet, 1);
        $CI->mpdf->WriteHTML($htmView, 2);
        $CI->mpdf->Output($fileName . '.pdf','D');
    }
}

/* End of file pdfexport_helper.php */
/* Location: ./application/helpers/pdfexport_helper.php */