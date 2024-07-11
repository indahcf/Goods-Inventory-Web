<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incoming_model extends CI_Model
{
    private $table = "incoming_items";

    public function getAll()
    {
        $this->db->select("incoming_items.*, items.name as item_name, suppliers.name as supplier_name");
        $this->db->order_by('incoming_items.created_at', 'DESC');
        $this->db->from("incoming_items");
        $this->db->join("items", "items.id = incoming_items.item_id");
        $this->db->join("suppliers", "suppliers.id = incoming_items.supplier_id");
        return  $this->db->get()->result();
    }

    public function filterDate($start, $end)
    {
        $this->db->select("incoming_items.*, items.name as item_name, suppliers.name as supplier_name");
        $this->db->order_by('incoming_items.created_at', 'DESC');
        $this->db->from("incoming_items");
        $this->db->join("items", "items.id = incoming_items.item_id");
        $this->db->join("suppliers", "suppliers.id = incoming_items.supplier_id");
        $this->db->where('incoming_items.created_at >=', $start);
        $this->db->where('incoming_items.created_at <=', $end);
        return $this->db->get()->result();
    }

    public function find($id)
    {
        $this->db->select("incoming_items.*, items.name as item_name, suppliers.name as supplier_name");
        $this->db->from("incoming_items");
        $this->db->join("items", "items.id = incoming_items.item_id");
        $this->db->join("suppliers", "suppliers.id = incoming_items.supplier_id");
        $this->db->where("incoming_items.id", $id);
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

                // update stock 
                $this->db->set('stock', 'stock+' . $data['qty'], FALSE);
                $this->db->where('id', $data['item_id']);
                $this->db->update('items');

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
