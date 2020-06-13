<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('mobil_model');
        $this->load->model('user_model');
        $this->load->model('transaksi_model');
        $this->load->model('pesan_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['mobil'] = $this->mobil_model->get_data_type('mobil')->result();
        $data['user'] = $this->user_model->get_data('user')->result();
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }
}
