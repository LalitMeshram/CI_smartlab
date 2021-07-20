<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Register extends CI_Controller {
	/**
	 * This function loads the registration form
	 */public function __construct()
	 {
        parent::__construct();
        $this->load->model('PaymentModel', 'payment');
    }

	public function index()
	{
		$this->load->view('registration-form');
	}

	/**
	 * This function creates order and loads the payment methods
	 */
	public function pay()
	{
		$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		/**
		 * You can calculate payment amount as per your logic
		 * Always set the amount from backend for security reasons
		 */
		$_SESSION['payable_amount'] = $this->input->post('amount');
		$_SESSION['packageId'] = $this->input->post('package_id');
		$_SESSION['duration'] = $this->input->post('duration');


		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' => 1 // auto capture
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount,$razorpayOrderId);

		$this->load->view('rezorpay',array('data' => $data));
	}

	/**
	 * This function verifies the payment,after successful payment
	 */
	public function verify()
	{
		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
			/**
			 * Call this function from where ever you want
			 * to save save data before of after the payment
			 */
			$userdata = $_SESSION['lsesson'];
			$this->setRegistrationData();
		$data['centerId']       = $userdata['centerId'];
        $data['packageId']          = $_SESSION['packageId'];
        $duration                   = $_SESSION['duration'];
        $data['startdate']          = date('Y-m-d');
        $data['enddate']            = date('Y-m-d', strtotime(date('Y-m-d') . ' +' . $duration . ' day'));
        $data['paymentmode']        = "UPI";
        $data['payment_ref_number'] =  $_SESSION['razorpay_order_id'];
        $id                         = $this->payment->payment_reg($data);

			redirect(base_url().'register/success');
		}
		else {
			redirect(base_url().'register/paymentFailed');
		}
	}

	/**
	 * This function preprares payment parameters
	 * @param $amount
	 * @param $razorpayOrderId
	 * @return array
	 */
	public function prepareData($amount,$razorpayOrderId)
	{
		$userdata = $_SESSION['lsesson'];
		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"name" => "Smart Lab",
			"description" => "Lab Description",
			"image" => "https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png",
			"prefill" => array(
				"name"  => $userdata['username'],//$this->input->post('name'),
				"email"  => $userdata['emailid'],//$this->input->post('email'),
				"contact" =>$userdata['contact_number']//$this->input->post('contact'),
			),
			"notes"  => array(
				"address"  => "Pune Maharashtra",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#528FF0"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	/**
	 * This function saves your form data to session,
	 * After successfull payment you can save it to database
	 */
	public function setRegistrationData()
	{
		$userdata = $_SESSION['lsesson'];
		$name = $userdata['username'];
		$email = $userdata['emailid'];
		$contact = $userdata['contact_number'];
		$amount = $_SESSION['payable_amount'];

		$registrationData = array(
			'order_id' => $_SESSION['razorpay_order_id'],
			'name' => $name,
			'email' => $email,
			'contact' => $contact,
			'amount' => $amount,
		);
		

	}

	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
	public function success()
	{

			$this->load->view('success');
		
	}
	/**
	 * This is a function called when payment failed,
	 * and shows the error message
	 */
	public function paymentFailed()
	{
		$this->load->view('error');
	}	
}