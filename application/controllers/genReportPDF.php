<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class genReportPDF extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('CarsModel','CarsModel');		
	}

	public function index()
	{				
		$this->load->view('reportPDF');
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */