<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_model extends CI_Model 
{
    public function get_data($table)
    {
        $query = $this->db->get($table);
        return $query;
    }

    public function get_data_user()
    {
        $this->db->select('pesan.id_pesan, pesan.nama, pesan.email, pesan.no_telp, pesan.isi_pesan, pesan.tgl_posting, pesan.status, user.nama, user.email');
        $this->db->from('pesan');
        $this->db->join('user', 'user.id_user = pesan.id_user');
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
}

/* End of file Pesan_model.php */
