<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mobil_model');
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['mobil'] = $this->mobil_model->get_data_type('mobil')->result();
        $data['type'] = $this->user_model->get_data('type')->result();

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/dashboard', $data);
        $this->load->view('template_customer/footer');
    }

    public function detail_mobil($id)
    {
        $data['title'] = 'Detail Mobil';
        $data['detail'] = $this->user_model->ambil_id_mobil($id);

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/detail_mobil', $data);
        $this->load->view('template_customer/footer');
    }
}
