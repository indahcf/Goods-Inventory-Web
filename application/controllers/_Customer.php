<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model', 'Customer');
    }
 





    
    /** 
     * This is the default function, it will return all rows
     * Pagingation is set here, you need to add route.
     * 
     * $route["/customer"]['GET'] = "/customer";
     * $route["/customer/(:num)"]['GET'] = "/customer";
     * 
     * @return void  */
    public function index()
    {
        $data['title'] = "Customer";
        $data['subtitle'] = "All Customer";

        $page_number = 8;
        $uri_segment = 3;
        $page_uri_segment = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        $total_rows = $this->customer->select_all(NULL, NULL, 1);
        $data['result'] = $this->customer->select_all($page_number, $page_uri_segment);
        $data["pagination"] = $this->__pagination(base_url("{$this->uri->segment(1)}/{$this->uri->segment(2)}"), $total_rows, $uri_segment, $page_number);
        $this->load->view('pages/customer/manage', $data);
    }

    /**
     * To view new form and insert row on POST request.
     * 
     *  @return void  */
    public function create()
    {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $data['title'] = "Add Customer";
            $data['subtitle'] = "New Customer";

            $this->load->view('pages/customer/new', $data);
        } else {

            $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[20]|xss_clean|strip_tags');
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|is_unique[customer.email]|xss_clean|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(['error' => true, 'message' => 'error', 'response' => validation_errors()]);
                return;
            }

            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
            ];


            if ($this->customer->insert($data)) {
                echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
                return;
            } else {
                echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
                return;
            }
        }
    }

    /**
     * To view single row detail.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function view($id)
    {
        $customer =  $this->customer->select($id);
        if (!$customer)
            show_404();

        $data['title'] = "Customer Details";
        $data['subtitle'] = "View Customer";
        $data['row'] = $customer;
        $this->load->view('pages/customer/view', $data);
    }

    /**
     * To view edit form and update on POST request
     * 
     * @param mixed $id 
     * @return void 
     */
    public function update($id)
    {
        $customer =  $this->customer->select($id);
        if (!$customer)
            show_404();

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $data['title'] = "Edit Customer";
            $data['subtitle'] = "Modify Customer";
            $data['row'] = $customer;

            $this->load->view('pages/customer/edit', $data);
        } else {

            $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[20]|xss_clean|strip_tags');
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|xss_clean|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(['error' => true, 'message' => 'error', 'response' => validation_errors()]);
                return;
            }

            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
            ];


            if ($this->customer->update($data, $id)) {
                echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
                return;
            } else {
                echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
                return;
            }
        }
    }

    /**
     * To set column deleted 1.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function soft_delete($id)
    {
        $customer =  $this->customer->select($id);
        if (!$customer)
            show_404();

        $data = ['deleted' => 1];

        if ($this->customer->update($data, $id)) {
            echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
            return;
        } else {
            echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
            return;
        }
    }

    /**
     * To delete row permanently.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function delete($id)
    {
        $customer =  $this->customer->select($id);
        if (!$customer)
            show_404();

        if ($this->customer->delete($id)) {
            echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
            return;
        } else {
            echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
            return;
        }
    }

    /**
     * @param mixed $url base_url('admin/users') etc.
     * @param mixed $total_rows return table total rows
     * @param int $uri_segment which segment will return page no default is 3.
     * @param int $per_page show records per page default is 15.
     * @return mixed 
     */
    private function __pagination($url, $total_rows, $uri_segment = 3,  $per_page = 15)
    {
        $config["base_url"] = $url;
        $config['suffix'] = (count($_GET) > 0) ? '?' . http_build_query($_GET, '', "&") : '';
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $uri_segment;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = FALSE;
        $config['attributes'] = ['class' => 'page-link'];


        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';


        $config["total_rows"] = $total_rows;

        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }
}


/* End of file Customer.php and path \application\controllers\Customer.php */
