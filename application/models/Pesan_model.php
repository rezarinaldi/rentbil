<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    public function get_data($table)
    {
        $query = $this->db->get($table);
        return $query;
    }

    public function get_data_user()
    {
        $this->db->select('pesan.id_pesan, pesan.id_user, pesan.isi_pesan, pesan.tgl_posting, pesan.status, user.nama, user.email, user.no_telp');
        $this->db->from('pesan');
        $this->db->join('user', 'user.id_user = pesan.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function insert_data($table)
    {
        $isi_pesan = $this->input->post('isi_pesan');
        $status = 0;

        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'isi_pesan' => $isi_pesan,
            'status' => $status
        );

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
