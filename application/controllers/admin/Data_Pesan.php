<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_Pesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('pesan_model');
    }

    public function index()
    {
        $data['title'] = 'Data Pesan';
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_pesan', $data);
        $this->load->view('template_admin/footer');
    }

    public function baca_pesan($id)
    {
        $this->load->model('pesan_model');
        $id_pesan = $id;
        $status = 1;

        $data = array(
            'status' => $status
        );
        $where = array(
            'id_pesan' => $id_pesan
        );

        $this->pesan_model->edit_data('pesan', $data, $where);

        echo "<script>window.location='" . base_url('admin/data_pesan') . "';</script>";
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Pesan Sudah Dibaca
        <button pesan="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/data_pesan');
    }

    public function delete_pesan($id)
    {
        $where = array('id_pesan' => $id);
        $this->pesan_model->delete_data($where, 'pesan');
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Pesan Berhasil Dihapus
        <button pesan="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/data_pesan');
    }
}

/* End of file Data_Pesan.php */
