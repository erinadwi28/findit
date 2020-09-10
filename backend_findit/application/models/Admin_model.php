<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_admin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('status_delete', 0);

        return $this->db->get();
    }

    public function insert_data($data)
    {
        $this->db->insert('admin', $data);
    }

    public function get_by_id($id_admin)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin', $id_admin);
        return $this->db->get();
    }

    public function update_data($id_admin, $data)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $data);
    }

    public function soft_delete_data($id_admin)
    {
        $data = array(
            'status_delete' => 1
        );
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $data);
    }
}
