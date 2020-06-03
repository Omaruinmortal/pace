<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**


* CodeIgniter PDF Library MPDF
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Chris Harvey
 * @license         MIT License
 * @link            https://github.com/chrisnharvey/CodeIgniter-  PDF-Generator-Library
*/

require_once FCPATH . 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ .'/tmp']);

//use Dompdf\Dompdf;
class Mpdf
{
/**
 * Get an instance of CodeIgniter
 *
 * @access  protected
 * @return  void
 */
	protected function ci()
	{
	    return get_instance();
	}

/**
 * Load a CodeIgniter view into domPDF
 *
 * @access  public
 * @param   string  $view The view to load
 * @param   array   $data The view data
 * @return  void
 */

	public function load($view, $data = array())
	{
		$html = $this->ci()->load->view($view, $data, TRUE);
		$mpdf = new \Mpdf\Mpdf(
		['margin_top'   =>0,
        'margin_left'   =>1,
        'mode'          =>  'utf-8', 
        'margin_right'  =>1,
        'format'        =>  'A4',
        'orientation'   =>  'P' ,
		'mirrorMargins' =>false]); // false para que no imprima a doble cara
		//$mpdf->SetImportUse();

		// Add First page


		$pagecount = $mpdf->SetSourceFile('assets/media/acls/carta_compromiso_acls.pdf');
		$tplId = $mpdf->ImportPage(1);
		$mpdf->SetPageTemplate($tplId);
		//$mpdf->AddPage('L');
		$stylesheet = file_get_contents('assets/css/style_pdf/acls/style_carta_compromiso.css');
		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

		$mpdf->Output();
	}

}
