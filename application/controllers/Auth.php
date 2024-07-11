<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'Auth');
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|strip_tags');
            $this->form_validation->set_rules('password', 'password', 'required|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                return $this->load->view("auth/login");
            }

            if ($row = $this->Auth->login($this->input->post('email'))) {
                if (password_verify($this->input->post('password'), $row->password)) {
                    if ($this->Auth->is_active($this->input->post('email'))) {
                        $this->session->set_userdata("auth", $row);
                        return redirect("/");
                    }

                    $this->session->set_flashdata("error", "Akun dinonaktifkan!");
                    return $this->load->view("auth/login");
                }
            }

            $this->session->set_flashdata("error", "email atau password tidak sesuai!");
            return $this->load->view("auth/login");
        }

        return $this->load->view("auth/login");
    }

    // public function register()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|strip_tags');
    //         $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[50]|strip_tags');
    //         $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|strip_tags|matches[password]');


    //         if ($this->form_validation->run() == FALSE) {
    //             return $this->load->view("auth/register");
    //         }

    //         if ($this->Auth->email_exists($this->input->post('email'))) {
    //             $this->session->set_flashdata("errors", "Email telah digunakan!");
    //             return $this->load->view("auth/register");
    //         }
    //         if ($this->Auth->register($this->input->post('email'), password_hash($this->input->post('password'), PASSWORD_BCRYPT))) {

    //             $this->session->set_flashdata("success", "Akun berhasil dibuat! Silahkan login terlebih dahulu!");
    //             return redirect('auth/login');
    //         } else {
    //             $this->session->set_flashdata("error", "Akun tidak dapat dibuat! Silahkan coba lagi!");
    //             return $this->load->view("auth/register");
    //         }
    //     }

    //     return $this->load->view("auth/register");
    // }

    public function logout()
    {
        $this->session->unset_userdata("auth");
        return redirect("auth/login");
    }
}


/* End of file Auth.php and path \application\controllers\Auth.php  */
