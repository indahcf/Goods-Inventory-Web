<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth) {
            return redirect("auth/login");
        }
        if ($this->session->auth->role != 'admin') {
            show_404();
        }
        $this->load->model("Outcoming_model", "Outcoming");
        $this->load->model("Incoming_model", "Incoming");
    }

    public function incoming()
    {
        $data['incomings'] = [];

        if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $data['incomings'] = $this->Incoming->filterDate($this->input->get('start_date'), $this->input->get('end_date'));
            if (count($data['incomings']) == 0) {
                $this->session->set_flashdata("warning", "Tidak ada data yang ditemukan!");
            }
        }
        $this->load->view("report/incoming/index", $data);
    }

    public function print_incoming()
    {
        $data['incomings'] = [];

        if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $data['incomings'] = $this->Incoming->filterDate($this->input->get('start_date'), $this->input->get('end_date'));
        }

        $this->load->view("report/incoming/print", $data);
    }

    public function outcoming()
    {
        $data['outcomings'] = [];

        if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $data['outcomings'] = $this->Outcoming->filterDate($this->input->get('start_date'), $this->input->get('end_date'));
            if (count($data['outcomings']) == 0) {
                $this->session->set_flashdata("warning", "Tidak ada data yang ditemukan!");
            }
        }
        $this->load->view("report/outcoming/index", $data);
    }

    public function print_outcoming()
    {
        $data['outcomings'] = [];

        if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') {
            $data['outcomings'] = $this->Outcoming->filterDate($this->input->get('start_date'), $this->input->get('end_date'));
        }

        $this->load->view("report/outcoming/print", $data);
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
