<?php 
                
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Customer_model extends CI_Model 
{

    protected $customer = 'customer';

    public function __construct()
    {
        parent::__construct();
    }




    /**
     * To return all rows according to pagination setup.
     * 
     * @param mixed $limit // limit number of rows
     * @param mixed $start // to start from row.
     * @param mixed $count // if set it will return num_rows
     * @return mixed 
     */
    public function select_all($limit = NULL, $start = NULL, $count = NULL)
    {
      if ($limit != NULL && $start != NULL)
        $this->db->limit($limit, $start);
  
      if ($limit != NULL && $start == NULL)
        $this->db->limit($limit);
  
      $this->db->order_by("id", "desc");
      $query = $this->db->get($this->customer);
  
      return ($count != NULL) ? $query->num_rows() : (($query->num_rows()) ? $query->result() : false);
    }
  
    /**
     * To select a single row.
     * 
     * @param int $id 
     * @return mixed 
     */
    public function select($id)
    {
      $this->db->where("id", $id);
      $query = $this->db->get($this->customer);
      return ($query->num_rows()) ? $query->row() : false;
    }
  
    /**
     * To insert a row
     * 
     * @param array $data array including data.
     * @return bool|int 
     */
    public function insert($data)
    {
      $this->db->trans_begin();
  
      $this->db->set($data);
      $this->db->insert($this->customer);
  
      if ($id = $this->db->insert_id())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return $id;
        }
      $this->db->trans_rollback();
      return false;
    }
  
    /**
     * @param array $data array including data.
     * @param int $id 
     * @return bool 
     */
    public function update($data, $id)
    {
      $this->db->trans_begin();
  
      $this->db->set($data);
      $this->db->where("id", $id);
      $this->db->update($this->customer);
  
      if ($this->db->affected_rows())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return true;
        }
      $this->db->trans_rollback();
      return false;
    }
  
    /**
     * To delete data permanently.
     * 
     * @param mixed $id 
     * @return bool 
     */
    public function delete($id)
    {
      $this->db->trans_begin();
  
      $this->db->where("id", $id);
      $this->db->delete($this->customer);
  
      if ($this->db->affected_rows())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return true;
        }
      $this->db->trans_rollback();
      return false;
    }
}

/* End of file Customer_model.php and path \application\models\Customer_model.php */
                    
