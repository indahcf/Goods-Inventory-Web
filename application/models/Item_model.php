<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{
    private $table = "items";

    public function getAll()
    {
        $this->db->select("items.*, categories.name as category_name, units.name as unit");
        $this->db->order_by('items.id', 'ASC');
        $this->db->from("items");
        $this->db->join("categories", "categories.id = items.category_id");
        $this->db->join("units", "units.id = items.unit_id");
        return  $this->db->get()->result();
    }

    public function getActive()
    {
        $this->db->select("items.*, categories.name as category_name, units.name as unit");
        $this->db->order_by('items.id', 'ASC');
        $this->db->from("items");
        $this->db->join("categories", "categories.id = items.category_id");
        $this->db->where('items.status', 'active');
        $this->db->join("units", "units.id = items.unit_id");
        $this->db->where('items.stock >', 0);
        return  $this->db->get()->result();
    }

    public function find($id)
    {
        $this->db->select("items.*, categories.name as category_name, units.name as unit");
        $this->db->from("items");
        $this->db->join("categories", "categories.id = items.category_id");
        $this->db->join("units", "units.id = items.unit_id");
        $this->db->where("items.id", $id);
        $query = $this->db->get();
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


/* End of file Guest_model.php and path \application\models\Guest_model.php */
