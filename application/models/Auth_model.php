<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    /*
    You can change users_table to your own.

        CREATE TABLE users_table (
        id int(11) UNSIGNED NOT NULL,
        email varchar(80) NOT NULL,
        password varchar(100) NOT NULL,
        status enum('pending','active','suspended','blocked') NOT NULL DEFAULT 'pending',
        last_login timestamp NULL DEFAULT NULL,
        last_activity timestamp NULL DEFAULT NULL,
        reset_password_code int(6) DEFAULT NULL,
        reset_password_time timestamp NULL DEFAULT NULL,
        deleted tinyint(4) NOT NULL DEFAULT '0',
        deleted_at timestamp NULL DEFAULT NULL,
        updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

    ALTER TABLE users ADD PRIMARY KEY (id);
    ALTER TABLE users MODIFY id int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

    */
    protected $users = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->users, 1);
        return ($query->num_rows()) ? $query->row() : false;
    }

    public function register($email, $password)
    {
        $data = [
            'email' => $email,
            'password' => $password
        ];
        $this->db->insert($this->users, $data);
        if ($this->db->insert_id())
            return true;

        return false;
    }

    public function email_exists($email)
    {
        $query = $this->db->get_where($this->users, ['email' => $email]);
        return $query->num_rows() > 0;
    }

    public function is_active($email)
    {
        $query = $this->db->get_where($this->users, ['email' => $email, 'status' => 'active']);
        return $query->num_rows() > 0;
    }
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
