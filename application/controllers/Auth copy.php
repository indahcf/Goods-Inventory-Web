<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('/Auth_model', 'Auth');
    }

    /*
    This is simple authentication.
    */

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|xss_clean|strip_tags');
            $this->form_validation->set_rules('password', 'password', 'required|xss_clean|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                return;
            }
            if ($row = $this->Auth->login($this->input->post('email'))) {
                if (password_verify($this->input->post('password'), $row->password)) {
                    if ($row->status == 'active') {

                        // When all details matched.
                        echo 'Successfully logged-in';
                        return;
                    } elseif ($row->status == 'pending') {

                        //If account status is not available
                        echo 'Account Status Is Pending';
                        return;
                    } elseif ($row->status == 'suspended') {

                        //If account status is not available
                        echo 'Account Suspended';
                        return;
                    } elseif ($row->status == 'blocked') {

                        //If account status is not available
                        echo 'Account Blocked';
                        return;
                    } else {

                        //If account status is not available
                        echo 'Unknow Status';
                        return;
                    }
                } else {

                    //If password is not matched
                    echo 'Unauthorized';
                    return;
                }
            } else {

                //If email is not matched
                echo 'Unauthorized';
                return;
            }
        }

        //If request method is other than POST
        echo 'Method Not Allowed';
        return;
    }



    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|xss_clean|strip_tags');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[50]|xss_clean|strip_tags');
            $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|xss_clean|strip_tags|matches[password]');


            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                return;
            }
            if ($this->Auth->register($this->input->post('email'), password_hash($this->input->post('password'), PASSWORD_BCRYPT))) {

                echo 'Account created successful!';
                return;
            } else {
                echo 'Cannot create your account';
                return;
            }
        }

        //If request method is other than POST
        echo 'Method Not Allowed';
        return;
    }
}


/* End of file Auth.php and path \application\controllers\Auth.php  */
