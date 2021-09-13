<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecieptController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Reciept_model','reciept');
		$this->load->library('pdf');
	}


	public function pdfdetails()
	{
		if($this->uri->segment(3))
		{
			$customer_id = $this->uri->segment(3);
			$html_content = '<h3 align="center">Convert HTML to PDF in CodeIgniter using Dompdf</h3>';
			$html_content .=  $this->reciept->getCustomerdetails($customer_id);
            $html_content .=  $this->reciept->getTestDetails($customer_id);
            $html_content .=  $this->reciept->getPaymentDetails($customer_id);
            $html_content .=  $this->reciept->getPendingStatus($customer_id);
            $html_content .=  $this->reciept->getFooterDetails($customer_id);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
		}
	}

}

?>
