<?php

class Transaksi extends CI_Controller
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
        $data['title'] = 'Data Transaksi';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_transaksi()
    {
        $data['title'] = 'Form Tambah Data Transaksi';
        $data['transaksi'] = $this->transaksi_model->get_data('transaksi')->result();
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = $this->transaksi_model->get_data_mobil('mobil')->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/form_tambah_transaksi', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_transaksi_simpan()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $id_user = $this->input->post('id_user');
        $id_mobil = $this->input->post('id_mobil');
        $tanggal_sewa = $this->input->post('tgl_sewa');
        $tanggal_kembali = $this->input->post('tgl_kembali');
        $harga_mobil = $this->input->post('harga');
        $selisih_hari = ((abs(strtotime($tanggal_sewa) - strtotime($tanggal_kembali))) / (60 * 60 * 24));
        $total_sewa = $harga_mobil * $selisih_hari;
        $status = $this->input->post('status');
        $pickup = $this->input->post('pickup');
        $status_pembayaran = 0;

        $data = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tanggal_sewa,
            'tanggal_kembali' => $tanggal_kembali,
            'total_sewa' => $total_sewa,
            'status' => $status,
            'pickup' => $pickup,
            'status_pembayaran' => $status_pembayaran
        );

        $this->transaksi_model->insert_data($data, 'transaksi');

        if ($status == 1) {
            $this->transaksi_model->insert_status_mobil_kosong($id_mobil, 'mobil');
        } else {
            $this->transaksi_model->insert_status_mobil_sedia($id_mobil, 'mobil');
        }
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Transaksi Berhasil Ditambahkan
        <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/transaksi');
    }

    public function edit_transaksi($id)
    {
        $where = array('id_transaksi' => $id);
        $data['title'] = 'Form Ubah Data Transaksi';
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = $this->transaksi_model->get_data('mobil')->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where('id_transaksi', $id);

        $data['transaksi'] = $this->db->get()->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/form_edit_transaksi', $data);
        $this->load->view('template_admin/footer');
    }

    public function edit_transaksi_simpan()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $id_user = $this->input->post('id_user');
        $id_mobil = $this->input->post('id_mobil');
        $tanggal_sewa = $this->input->post('tgl_sewa');
        $tanggal_kembali = $this->input->post('tgl_kembali');
        $harga_mobil = $this->input->post('harga');
        $selisih_hari = ((abs(strtotime($tanggal_sewa) - strtotime($tanggal_kembali))) / (60 * 60 * 24));
        $total_sewa = $harga_mobil * round($selisih_hari);
        $pickup = $this->input->post('pickup');

        $data = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tanggal_sewa,
            'tanggal_kembali' => $tanggal_kembali,
            'total_sewa' => $total_sewa,
            'status' => 1,
            'pickup' => $pickup
        );

        $where2 = array('id_mobil' => $data->id_mobil);

        $data2 = array('status_mobil' => '0');

        $where = array(
            'id_transaksi' => $id_transaksi
        );

        $this->transaksi_model->edit_data('mobil', $data2, $where2);
        $this->transaksi_model->edit_data('transaksi', $data, $where);

        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Transaksi Berhasil Diubah
        <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/transaksi');
    }

    public function delete_transaksi($id)
    {
        $where = array('id_transaksi' => $id);
        $this->transaksi_model->delete_data($where, 'transaksi');
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Transaksi Berhasil Dihapus
        <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/transaksi');
    }

    public function menunggu_pembayaran()
    {
        $data['title'] = 'Menunggu Pembayaran';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/transaksi_menunggu_pembayaran', $data);
        $this->load->view('template_admin/footer');
    }

    public function menunggu_konfirmasi()
    {
        $data['title'] = 'Menunggu Konfirmasi';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/transaksi_menunggu_konfirmasi', $data);
        $this->load->view('template_admin/footer');
    }

    public function sedang_disewa()
    {
        $data['title'] = 'Sedang Disewa';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/transaksi_sedang_disewa', $data);
        $this->load->view('template_admin/footer');
    }

    public function selesai()
    {
        $data['title'] = 'Transaksi Selesai';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('template_admin/footer');
    }

    public function batal()
    {
        $data['title'] = 'Transaksi Batal';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/transaksi_batal', $data);
        $this->load->view('template_admin/footer');
    }

    public function konfirmasi_pembayaran($id)
    {
        $id_transaksi = $id;
        $status_pembayaran = 2;

        $data = array(
            'status_pembayaran' => $status_pembayaran
        );

        $where = array(
            'id_transaksi' => $id_transaksi
        );

        $this->transaksi_model->edit_data('transaksi', $data, $where);

        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Pembayaran Berhasil Dikonfirmasi
        <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/transaksi/menunggu_konfirmasi');
    }

    // laporan
    function laporan()
    {
        $data['title'] = 'Laporan Transaksi';
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == true) {
            $data['laporan'] = $this->db->query("select * from transaksi, mobil, user where transaksi.id_mobil=mobil.id_mobil and transaksi.id_user=user.id_user and tanggal_sewa between '$dari' and '$sampai'")->result();
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('admin/laporan_filter_transaksi', $data);
            $this->load->view('template_admin/footer');
        } else {
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('admin/laporan_transaksi');
            $this->load->view('template_admin/footer');
        }
    }

    //fitur print laporan
    function laporan_print()
    {
        $data['title'] = 'Laporan Transaksi';
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        if ($dari != "" && $sampai != "") {
            $data['laporan'] = $this->db->query("select * from transaksi, mobil, user where transaksi.id_mobil=mobil.id_mobil and transaksi.id_user=user.id_user and tanggal_sewa between '$dari' and '$sampai'")->result();
            $this->load->view('admin/laporan_transaksi_print', $data);
        } else {
            redirect('admin/laporan', 'refresh');
        }
    }
}
