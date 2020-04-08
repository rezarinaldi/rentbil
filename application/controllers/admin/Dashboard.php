<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('pesan_model');
        $this->load->model('transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pesan'] = $this->pesan_model->get_data('pesan')->result();
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }
}
