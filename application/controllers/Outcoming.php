<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outcoming extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth) {
			return redirect("auth/login");
		}
        $this->load->model("Outcoming_model", "Outcoming");
        $this->load->model("Customer_model", "Customer");
        $this->load->model("Item_model", "Item");
    }

    public function index()
    {
        $data['outcomings'] = $this->Outcoming->getAll();

        $this->load->view("outcoming/index", $data);
    }

    public function create()
    {
        $data['customers'] = $this->Customer->getAll();
        $data['items'] = $this->Item->getActive();

        $outcoming = [
            'customer_id' => $this->input->post('customer_id'),
            'item_id' => $this->input->post('item_id'),
            'qty' => $this->input->post('qty'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            if ($this->Outcoming->create($outcoming)) {
                $this->session->set_flashdata("success", "Data berhasil ditambahkan!");
            }
            return redirect("outcoming/index");
        }

        $this->load->view("outcoming/create", $data);
    }


    public function delete($id)
    {
        $outcoming =  $this->Outcoming->find($id);
        if (!$outcoming) {
            show_404();
        }

        if ($this->Outcoming->delete($id)) {
            $this->session->set_flashdata("success", "Data berhasil dihapus!");
        } else {
            $this->session->set_flashdata("error", "Data gagal dihapus!");
        }

        return redirect("outcoming/index");
    }


    private function validatinRules()
    {
        $this->form_validation->set_rules('item_id', 'Barang', 'required');
        $this->form_validation->set_rules('customer_id', 'Customer', 'required');
        $this->form_validation->set_rules('qty', 'Kuantitas', 'required');
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
