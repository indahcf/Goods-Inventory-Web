<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->model("User_model", "User");
        $this->load->model("Auth_model", "Auth");
    }

    public function index()
    {
        $data['users'] = $this->User->getAll();

        $this->load->view("user/index", $data);
    }

    public function create()
    {


        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|strip_tags');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[50]|strip_tags');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|strip_tags|matches[password]');

        if ($this->form_validation->run()) {
            
            $user = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role'),
                'status' => $this->input->post('status'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            ];

            if ($this->Auth->email_exists($this->input->post('email'))) {
                $this->session->set_flashdata("error", "Email telah digunakan!");
                return $this->load->view("user/create");
            }
            $this->User->create($user);
            $this->session->set_flashdata("success", "Data berhasil ditambahkan!");
            return redirect("user");
        }

        $this->load->view("user/create");
    }

    public function edit($id)
    {
        $data['user'] =  $this->User->find($id);

        if (!$data['user']) {
            show_404();
        }

        $user = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status'),
        ];

        if ($this->input->post('password') != '') {
            $user['password'] = $this->input->post('password');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[50]|strip_tags');
            $this->form_validation->set_rules('confirm_password', 'required|confirm password', 'strip_tags|matches[password]');
        }

        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|strip_tags');


        if ($this->form_validation->run()) {
            $this->User->update($user, $id);
            $this->session->set_flashdata("success", "Data berhasil diubah!");
            return redirect("user");
        }

        $this->load->view("user/edit", $data);
    }

    public function delete($id)
    {
        $user =  $this->User->find($id);
        if (!$user) {
            show_404();
        }

        if ($this->User->delete($id)) {
            $this->session->set_flashdata("success", "Data berhasil dihapus!");
        } else {
            $this->session->set_flashdata("error", "Data gagal dihapus!");
        }

        return redirect("user/index");
    }
}

/* End of file Product.php and path \application\controllers\Product.php */
