<?php

class transaksi_model extends CI_Model
{
    public function get_data($table)
    {
        $query = $this->db->get($table);
        return $query;
    }

    public function get_data_transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function get_data_mobil($table)
    {
        $this->db->where('status_mobil', 1);
        $query = $this->db->get($table);
        return $query;
    }

    public function get_where($where, $table)
    {
        return $this->db->get_where($table, $where);
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

    public function insert_status_mobil_sedia($where, $table)
    {
        $this->db->query("update mobil set status_mobil = 1 where id_mobil=$where");
    }

    public function insert_status_mobil_kosong($where, $table)
    {
        $this->db->query("update mobil set status_mobil = 0 where id_mobil=$where");
    }
}
