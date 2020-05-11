<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rental extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('transaksi_model');
        $this->load->model('rental_model');
        $this->load->model('pesan_model');
        $this->load->model('mobil_model');
    }

    public function tambah_rental($id)
    {
        check_not_login();

        $data['title'] = 'Tambah Rental';
        $data['mobil'] = $this->mobil_model->ambil_id_mobil($id);

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/tambah_rental', $data);
        $this->load->view('template_customer/footer');
    }

    public function tambah_rental_ready_simpan()
    {
        check_not_login();

        $id = $this->input->post('id_mobil');
        $mobil = $this->mobil_model->ambil_id_mobil($id);
        $tgl_sewa = $this->input->post('tgl_sewa');
        $tgl_kembali = $this->input->post('tgl_kembali');
        $durasi = abs(round((strtotime($tgl_sewa) - strtotime($tgl_kembali)) / 86400));
        $data = array(
            'tgl_sewa' => $tgl_sewa,
            'tgl_kembali' => $tgl_kembali,
            'durasi' => $durasi,
            'mobil' => $mobil
        );
        $data['title'] = 'Tambah Rental Ready Simpan';
        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/tambah_rental_ready', $data);
        $this->load->view('template_customer/footer');
    }

    public function tambah_rental_simpan()
    {
        check_not_login();

        $id_mobil = $this->input->post('id_mobil');
        $tgl_sewa = strtotime($this->input->post('tanggal_sewa'));
        $tgl_sewa = date("Y-m-d", $tgl_sewa);
        $tgl_kembali = $this->input->post('tanggal_kembali');
        $pickup = $this->input->post('pickup');
        $durasi = abs(round((strtotime($tgl_sewa) - strtotime($tgl_kembali)) / 86400));
        $harga = $this->input->post('harga');
        $total_sewa = $harga * $durasi;
        $status = 1;
        $status_pembayaran = 0;

        $data = array(
            'id_user'   => $this->session->userdata('id_user'),
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tgl_sewa,
            'tanggal_kembali' => $tgl_kembali,
            'pickup' => $pickup,
            'total_sewa' => $total_sewa,
            'status' => $status,
            'status_pembayaran' => $status_pembayaran
        );

        $this->rental_model->insert_data($data, 'transaksi');
        if ($status == 1) {
            $this->transaksi_model->insert_status_mobil_kosong($id_mobil, 'mobil');
        } else {
            $this->transaksi_model->insert_status_mobil_sedia($id_mobil, 'mobil');
        };

        $tglsewa = strtotime($this->input->post('tanggal_sewa'));
        $jmlhari  = 86400 * 1;
        $tgl      = $tglsewa - $jmlhari;
        $batas_bayar = date("d-m-Y", $tgl);
        $pickup = $this->input->post('pickup');
        $merk = $this->input->post('nama_mobil');
        $durasi = $this->input->post('durasi');
        $data = array(
            'nama'   => $this->session->userdata('nama'),
            'merk' => $merk,
            'tanggal_sewa' => $tgl_sewa,
            'tanggal_kembali' => $tgl_kembali,
            'pickup' => $pickup,
            'durasi' => $durasi,
            'total_sewa' => $total_sewa,
            'batas_bayar' => $batas_bayar
        );

        echo "<script>alert('Mobil Berhasil Dibooking')</script>";
        $data['title'] = 'Detail Sewa';
        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/detail_sewa', $data);
        $this->load->view('template_customer/footer');
    }

    public function riwayat_sewa()
    {
        check_not_login();

        $data['title'] = 'Riwayat Sewa';

        $id_user = $this->fungsi->user_login()->id_user;
        $data['transaksi'] = $this->rental_model->get_transaksi($id_user);
        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/riwayat_sewa', $data);
        $this->load->view('template_customer/footer');
    }

    //fitur cetak sewa
    public function cetak_sewa($id)
    {
        check_not_login();

        $data['title'] = 'Detail Sewa';
        $data['detail'] = $this->rental_model->get_transaksi_id($id);
        $this->load->view('customer/cetak_sewa', $data);
    }

    public function konfirmasi_pembayaran($id)
    {
        check_not_login();

        $data['id_transaksi'] = $id;
        $data['title'] = 'Upload Bukti Pembayaran';

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/konfirmasi_pembayaran', $data);
        $this->load->view('template_customer/footer');
    }

    public function konfirmasi_pembayaran_simpan()
    {
        check_not_login();

        $id = $this->input->post('id_transaksi');

        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

        $config['upload_path'] = './assets/upload/bukti_pembayaran';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_pembayaran')) {
            echo "<script>alert('Bukti Pembayaran Gagal di-Upload')</script>";
        } else {
            $bukti_pembayaran = $this->upload->data('file_name');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Bukti Pembayaran Berhasil di-Upload
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        }

        $status_pembayaran = 1;

        $data = array(
            'bukti_pembayaran' => $bukti_pembayaran,
            'status_pembayaran' => $status_pembayaran
        );

        $where = array(
            'id_transaksi' => $id
        );

        $this->transaksi_model->edit_data('transaksi', $data, $where);

        echo "<script>window.location='" . base_url('customer/rental/riwayat_sewa') . "';</script>";
    }

    public function batal_sewa($id)
    {
        check_not_login();

        $where = array('id_transaksi' => $id);
        $data = $this->transaksi_model->get_where($where, 'transaksi')->row();

        $where2 = array('id_mobil' => $data->id_mobil);

        $data2 = array('status_mobil' => '1');

        $data = array(
            'status' => '0',
            'status_pembayaran' => '3'
        );

        $this->transaksi_model->edit_data('mobil', $data2, $where2);
        $this->transaksi_model->edit_data('transaksi', $data, $where);

        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Penyewaan Berhasil Dibatalkan
        <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('customer/rental/riwayat_sewa');
    }

    public function pengembalian_mobil($id)
    {
        $where = array('id_transaksi' => $id);
        $data['title'] = 'Pengembalian Mobil';
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = $this->transaksi_model->get_data('mobil')->result();

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where('id_transaksi', $id);

        $data['transaksi'] = $this->db->get()->result();
        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/pengembalian_mobil', $data);
        $this->load->view('template_customer/footer');
    }

    public function pengembalian_mobil_aksi()
    {
        $id                   = $this->input->post('id_transaksi');
        $id_mobil             = $this->input->post('id_mobil');
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $status               = $this->input->post('status');
        $tanggal_kembali      = $this->input->post('tanggal_kembali');
        $denda                = $this->input->post('denda');

        $x           = strtotime($tanggal_pengembalian);
        $y           = strtotime($tanggal_kembali);
        $selisih     = abs($x - $y) / (60 * 60 * 24);
        $total_denda = $denda * $selisih;

        $data = array(
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'status' => $status,
            'total_denda' => $total_denda
        );

        $where = array(
            'id_transaksi' => $id
        );

        $this->transaksi_model->edit_data('transaksi', $data, $where);

        if ($status == 1) {
            $this->transaksi_model->insert_status_mobil_kosong($id_mobil, 'mobil');
        } else {
            $this->transaksi_model->insert_status_mobil_sedia($id_mobil, 'mobil');
        }

        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Mobil Berhasil Dikembalikan
        <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('customer/rental/riwayat_sewa');
    }

    public function tentang_kami()
    {
        $data['title'] = 'Tentang Kami';

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/tentang_kami');
        $this->load->view('template_customer/footer');
    }

    public function faqs()
    {
        $data['title'] = 'FAQs';

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/faqs');
        $this->load->view('template_customer/footer');
    }

    public function kotak_pesan()
    {
        check_not_login();

        $data['title'] = 'Kotak Pesan';
        $data['user'] = $this->user_model->get_data('user')->result();

        $this->load->view('template_customer/header', $data);
        $this->load->view('customer/kotak_pesan');
        $this->load->view('template_customer/footer');
    }

    public function kirim_pesan()
    {
        check_not_login();

        $this->pesan_model->insert_data('pesan');

        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Pesan Berhasil Dikirim
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('customer/rental/kotak_pesan');
    }
}
