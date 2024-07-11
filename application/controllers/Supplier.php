<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth) {
			return redirect("auth/login");
		}
        $this->load->model("Supplier_model", "Supplier");
    }

    public function index()
    {
        $data['suppliers'] = $this->Supplier->getAll();

        $this->load->view("supplier/index", $data);
    }

    public function create()
    {
        $data['suppliers'] = $this->Supplier->getAll();

        $supplier = [
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'status' => $this->input->post('status'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Supplier->create($supplier);
            $this->session->set_flashdata("success", "Data berhasil ditambahkan!");
            return redirect("supplier");
        }

        $this->load->view("supplier/create", $data);
    }

    public function edit($id)
    {
        $data['supplier'] =  $this->Supplier->find($id);

        if (!$data['supplier']) {
            show_404();
        }

        $supplier = [
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'status' => $this->input->post('status'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Supplier->update($supplier, $id);
            $this->session->set_flashdata("success", "Data berhasil diubah!");
            return redirect("supplier");
        }

        $this->load->view("supplier/edit", $data);
    }

    public function delete($id)
    {
        $supplier =  $this->Supplier->find($id);
        if (!$supplier) {
            show_404();
        }

        if ($this->Supplier->delete($id)) {
            $this->session->set_flashdata("success", "Data berhasil dihapus!");
        } else {
            $this->session->set_flashdata("error", "Data gagal dihapus!");
        }

        return redirect("supplier/index");
    }


    private function validatinRules()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->Set_rules('status', 'Status', 'required');
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
