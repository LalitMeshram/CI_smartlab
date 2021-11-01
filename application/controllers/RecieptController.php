<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecieptController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Reciept_model','reciept');
		//$this->load->model('Report_print_model','report');
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
        //    $html_content .=  $this->reciept->getPaymentDetails($customer_id);
           $html_content .=  $this->reciept->getPendingStatus($customer_id);
            $html_content .=  $this->reciept->getFooterDetails($customer_id);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
		}
	}

	public function report_print()
	{
		if($this->uri->segment(3))
		{
			$caseId = $this->uri->segment(3);
			$html_content = '<h3 align="center">Smart Lab</h3>';
			// $html_content .=  $this->reciept->getCustomerdetails($caseId);
			$html_content .=  $this->reciept->getReportDetails($caseId);
           $html_content .=  $this->reciept->get_findings_check($caseId);
            $html_content .=  $this->reciept->getFooterDetails($caseId);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
		}
	}

	public function Test()
	{

	//echo date_diff(date_create('1970-02-01'), date_create('today'))->y;
	$interval = date_diff(date_create(), date_create('2008-01-01 10:30:00'));
echo $interval->format("You are  %Y Year, %M Months, %d Days, %H Hours, %i Minutes, %s Seconds Old");
	}

}

?>
