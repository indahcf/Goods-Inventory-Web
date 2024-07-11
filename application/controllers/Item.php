<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth) {
			return redirect("auth/login");
		}
        $this->load->model("Item_model", "Item");
        $this->load->model("Category_model", "Category");
        $this->load->model("Unit_model", "Unit");
    }

    public function index()
    {
        $data['items'] = $this->Item->getAll();

        $this->load->view("item/index", $data);
    }

    public function create()
    {
        $data['categories'] = $this->Category->getAll();
        $data['units'] = $this->Unit->getAll();

        $item = [
            'name' => $this->input->post('name'),
            'category_id' => $this->input->post('category_id'),
            'unit_id' => $this->input->post('unit_id'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'status' => $this->input->post('status'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Item->create($item);
            $this->session->set_flashdata("success", "Data barang berhasil ditambahkan!");
            return redirect("item/index");
        }

        $this->load->view("item/create", $data);
    }

    public function edit($id)
    {
        $data['item'] =  $this->Item->find($id);
        $data['categories'] = $this->Category->getAll();
        $data['units'] = $this->Unit->getAll();


        if (!$data['item']) {
            show_404();
        }


        $item = [
            'name' => $this->input->post('name'),
            'category_id' => $this->input->post('category_id'),
            'unit_id' => $this->input->post('unit_id'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'status' => $this->input->post('status'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Item->update($item, $id);
            $this->session->set_flashdata("success", "Data barang berhasil diubah!");
            return redirect("item/index");
        }

        $this->load->view("item/edit", $data);
    }

    public function delete($id)
    {
        $item =  $this->Item->find($id);
        if (!$item) {
            show_404();
        }

        if ($this->Item->delete($id)) {
            $this->session->set_flashdata("success", "Data barang berhasil dihapus!");
        } else {
            $this->session->set_flashdata("error", "Data barang gagal dihapus!");
        }

        return redirect("item/index");
    }


    private function validatinRules()
    {
        $this->form_validation->set_rules('category_id', 'Kategori', 'required');
        $this->form_validation->set_rules('unit_id', 'Satuan', 'required');
        $this->form_validation->set_rules('name', 'Nama Barang', 'required');
        $this->form_validation->set_rules('stock', 'Stok Barang', 'required');
        $this->form_validation->Set_rules('price', 'Harga', 'required');
        $this->form_validation->Set_rules('status', 'Status', 'required');
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
