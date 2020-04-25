<?php

class mobil_model extends CI_Model
{
    public function get_data($table)
    {
        $query = $this->db->get($table);
        return $query;
    }

    public function get_data_type()
    {
        $this->db->select('*');
        $this->db->from('mobil');
        $this->db->join('type', 'mobil.id_type = type.id_type');
        $query = $this->db->get();
        return $query;
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function ambil_id_mobil($id)
    {
        $this->db->select('*');
        $this->db->from('mobil');
        $this->db->join('type', 'mobil.id_type = type.id_type');
        $hasil = $this->db->where('id_mobil', $id)->get();

        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }
}
