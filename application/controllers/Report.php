<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('sale_m', 'sale');  
	}
	
	public function sale()
	{
		$data['row'] = $this->sale->get_sale();
		$this->template->load('template', 'report/sale_report', $data);
	}

	public function resep()
	{
		$data['row'] = $this->sale->get_sale();
		$this->template->load('template', 'report/resep_report', $data);
	}

	public function sale_product($sale_id = null)
	{
		$detail = $this->sale->get_sale_detail($sale_id)->result();
		echo json_encode($detail);
	}
}
