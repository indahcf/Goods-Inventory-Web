<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Category_model extends CI_Model 
{
    private $table = 'categories';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
    public function find($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get($this->table);
        return ($query->num_rows()) ? $query->row() : false;
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update($this->table);

        if ($this->db->affected_rows()) {
            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return true;
            }
        }

        $this->db->trans_rollback();
        return false;
    }

    public function create($data)
    {

        $this->db->set($data);
        $this->db->insert($this->table);

        if ($id = $this->db->insert_id()) {
            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return $id;
            }
        }

        $this->db->trans_rollback();

        return false;
    }

    public function delete($id)
    {

        $this->db->trans_begin();

        $this->db->where("id", $id);
        $this->db->delete($this->table);

        if ($this->db->affected_rows())
            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return true;
            }
        $this->db->trans_rollback();
        return false;
    }
                        
}


/* End of file Category_model.php and path \application\models\Category_model.php */
