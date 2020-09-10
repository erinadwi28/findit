<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kantor_model extends CI_Model
{
    public function get_kantor()
    {
        $this->db->select('*');
        $this->db->from('kantor');
        $this->db->where('status_delete', 0);

        return $this->db->get();
    }

    public function insert_data($data)
    {
        $this->db->insert('kantor', $data);
    }

    public function get_by_id($id_kantor)
    {
        $this->db->select('*');
        $this->db->from('kantor');
        $this->db->where('id_kantor', $id_kantor);
        return $this->db->get();
    }

    public function update_data($id_kantor, $data)
    {
        $this->db->where('id_kantor', $id_kantor);
        $this->db->update('kantor', $data);
    }

    public function soft_delete_data($id_kantor)
    {
        $data = array(
            'status_delete' => 1
        );
        $this->db->where('id_kantor', $id_kantor);
        $this->db->update('kantor', $data);
    }
}
