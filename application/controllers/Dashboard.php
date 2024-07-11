<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->auth) {
			return redirect("auth/login");
		}
	}


	public function index()
	{
		$data = [
			'incomings' => $this->db->get('incoming_items')->num_rows(),
			'outcomings' => $this->db->get('outcoming_items')->num_rows(),
			'items' => $this->db->get('items')->num_rows(),
			'customers' => $this->db->get('customers')->num_rows(),
		];
		$this->load->view('dashboard/index', $data);
	}
}
