<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incoming extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth) {
			return redirect("auth/login");
		}
        $this->load->model("Incoming_model", "Incoming");
        $this->load->model("Supplier_model", "Supplier");
        $this->load->model("Item_model", "Item");
    }

    public function index()
    {
        $data['incomings'] = $this->Incoming->getAll();

        $this->load->view("incoming/index", $data);
    }

    public function create()
    {
        $data['suppliers'] = $this->Supplier->getAll();
        $data['items'] = $this->Item->getAll();

        $incoming = [
            'supplier_id' => $this->input->post('supplier_id'),
            'item_id' => $this->input->post('item_id'),
            'qty' => $this->input->post('qty'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            if ($this->Incoming->create($incoming)) {
                $this->session->set_flashdata("success", "Data berhasil ditambahkan!");
            }
            return redirect("incoming/index");
        }

        $this->load->view("incoming/create", $data);
    }


    public function delete($id)
    {
        $incoming =  $this->Incoming->find($id);
        if (!$incoming) {
            show_404();
        }

        if ($this->Incoming->delete($id)) {
            $this->session->set_flashdata("success", "Data berhasil dihapus!");
        } else {
            $this->session->set_flashdata("error", "Data gagal dihapus!");
        }

        return redirect("incoming/index");
    }


    private function validatinRules()
    {
        $this->form_validation->set_rules('item_id', 'Barang', 'required');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('qty', 'Kuantitas', 'required');
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
