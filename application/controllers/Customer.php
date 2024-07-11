<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth) {
			return redirect("auth/login");
		}
        $this->load->model("Customer_model", "Customer");
    }

    public function index()
    {
        $data['customers'] = $this->Customer->getAll();

        $this->load->view("customer/index", $data);
    }

    public function create()
    {

        $customer = [
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'status' => $this->input->post('status'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Customer->create($customer);
            $this->session->set_flashdata("success", "Data berhasil ditambahkan!");
            return redirect("customer");
        }

        $this->load->view("customer/create");
    }

    public function edit($id)
    {
        $data['customer'] =  $this->Customer->find($id);

        if (!$data['customer']) {
            show_404();
        }

        $customer = [
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'status' => $this->input->post('status'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Customer->update($customer, $id);
            $this->session->set_flashdata("success", "Data berhasil diubah!");
            return redirect("customer");
        }

        $this->load->view("customer/edit", $data);
    }

    public function delete($id)
    {
        $customer =  $this->Customer->find($id);
        if (!$customer) {
            show_404();
        }

        if ($this->Customer->delete($id)) {
            $this->session->set_flashdata("success", "Data berhasil dihapus!");
        } else {
            $this->session->set_flashdata("error", "Data gagal dihapus!");
        }

        return redirect("customer/index");
    }


    private function validatinRules()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->Set_rules('status', 'Status', 'required');
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
