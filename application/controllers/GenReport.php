<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class genReport extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('CarsModel','CarsModel');		
	}

	public function genReportPDF(){				
		$this->load->view('ReportPDF');
	}

	public function genReserveHistoryByCar(){				
		$this->load->view('ReserveHistoryByCar');
	}

	public function genReserveSummary(){				
		$this->load->view('ReserveSummary');
	}

}

/* End of file CarController.php */
/* Location: ./application/controllers/CarController.php */