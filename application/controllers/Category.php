<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth) {
			return redirect("auth/login");
		}
        $this->load->model("Category_model", "Category");
    }

    public function index()
    {
        $data['categories'] = $this->Category->getAll();

        $this->load->view("category/index", $data);
    }

    public function create()
    {
        $data['categories'] = $this->Category->getAll();

        $category = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Category->create($category);
            $this->session->set_flashdata("success", "Data berhasil ditambahkan!");
            return redirect("category");
        }

        $this->load->view("category/create", $data);
    }

    public function edit($id)
    {
        $data['category'] =  $this->Category->find($id);

        if (!$data['category']) {
            show_404();
        }

        $category = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Category->update($category, $id);
            $this->session->set_flashdata("success", "Data berhasil diubah!");
            return redirect("category");
        }

        $this->load->view("category/edit", $data);
    }

    public function delete($id)
    {
        $category =  $this->Category->find($id);
        if (!$category) {
            show_404();
        }

        $this->db->where('category_id', $id);
        $query = $this->db->get('items');

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata("error", "Data gagal dihapus! Kategori sedang digunakan!");
        } else {
            if ($this->Category->delete($id)) {
                $this->session->set_flashdata("success", "Data berhasil dihapus!");
            } else {
                $this->session->set_flashdata("error", "Data gagal dihapus!");
            }
        }

        return redirect("category/index");
    }


    private function validatinRules()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->Set_rules('status', 'Status', 'required');
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
