<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->auth) {
			return redirect("auth/login");
		}
        $this->load->model("Unit_model", "Unit");
    }

    public function index()
    {
        $data['categories'] = $this->Unit->getAll();

        $this->load->view("unit/index", $data);
    }

    public function store()
    {
        $unit = [
            'name' => $this->input->post('name'),
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Unit->create($unit);
            $this->session->set_flashdata("success", "Data berhasil ditambahkan!");
        }

        return redirect("unit");
    }

    public function update($id)
    {
        $data['unit'] =  $this->Unit->find($id);

        if (!$data['unit']) {
            show_404();
        }

        $unit = [
            'name' => $this->input->post('name')
        ];

        $this->validatinRules();

        if ($this->form_validation->run()) {
            $this->Unit->update($unit, $id);
            $this->session->set_flashdata("success", "Data berhasil diubah!");
        }

        return redirect("unit");
    }

    public function delete($id)
    {
        $unit =  $this->Unit->find($id);
        if (!$unit) {
            show_404();
        }

        $this->db->where('unit_id', $id);
        $query = $this->db->get('items');

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata("error", "Data gagal dihapus! Satuan sedang digunakan!");
        } else {
            if ($this->Unit->delete($id)) {
                $this->session->set_flashdata("success", "Data berhasil dihapus!");
            } else {
                $this->session->set_flashdata("error", "Data gagal dihapus!");
            }
        }


        return redirect("unit/index");
    }


    private function validatinRules()
    {
        $this->form_validation->set_rules('name', 'Nama Satuan', 'required');
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
