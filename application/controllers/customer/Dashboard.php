<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mobil_model');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['mobil'] = $this->mobil_model->get_data_type('mobil')->result();

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/dashboard', $data);
        $this->load->view('template_customer/footer');
    }

    public function list_mobil()
    {
        $data['title'] = 'List Mobil';
        $data['mobil'] = $this->mobil_model->get_data_type('mobil')->result();

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/list_mobil', $data);
        $this->load->view('template_customer/footer');
    }

    public function detail_mobil($id)
    {
        $data['title'] = 'Detail Mobil';
        $data['mobil'] = $this->mobil_model->ambil_id_mobil($id);

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/detail_mobil', $data);
        $this->load->view('template_customer/footer');
    }
}
