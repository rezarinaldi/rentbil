<?php

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_transaksi()
    {
        $data['title'] = 'Form Tambah Data Transaksi';
        $data['transaksi'] = $this->transaksi_model->get_data('transaksi')->result();
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = $this->transaksi_model->get_data_mobil('mobil')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
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
        $status_pembayaran = 0;

        $data = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tanggal_sewa,
            'tanggal_kembali' => $tanggal_kembali,
            'total_sewa' => $total_sewa,
            'status' => $status,
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
            Data transaksi Berhasil Ditambahkan
            <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/transaksi/selesai');
    }

    public function edit_transaksi($id)
    {
        $where = array('id_transaksi' => $id);
        $data['title'] = 'Form Ubah Data Transaksi';
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = $this->transaksi_model->get_data('mobil')->result();

        $this->db->select('transaksi.id_transaksi, transaksi.id_user, transaksi.id_mobil, mobil.harga , user.nama, mobil.merk, transaksi.tanggal_sewa, transaksi.tanggal_kembali, transaksi.status');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where('id_transaksi', $id);
        $data['transaksi'] = $this->db->get()->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
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
        $status = $this->input->post('status');

        $data = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tanggal_sewa,
            'tanggal_kembali' => $tanggal_kembali,
            'total_sewa' => $total_sewa,
            'status' => $status
        );

        echo print_r($data);

        $where = array(
            'id_transaksi' => $id_transaksi
        );

        $this->transaksi_model->edit_data('transaksi', $data, $where);

        if ($status == 1) {
            $this->transaksi_model->insert_status_mobil_kosong($id_mobil, 'mobil');
        } else {
            $this->transaksi_model->insert_status_mobil_sedia($id_mobil, 'mobil');
        }

        $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data transaksi Berhasil Diubah
            <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/transaksi/selesai');
    }

    public function delete_transaksi($id)
    {
        $where = array('id_transaksi' => $id);
        $this->transaksi_model->delete_data($where, 'transaksi');
        $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data transaksi Berhasil Dihapus
                <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('admin/transaksi/selesai');
    }

    public function menunggu_pembayaran()
    {
        $data['title'] = 'Menunggu Pembayaran';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/transaksi_menunggu_pembayaran', $data);
        $this->load->view('template_admin/footer');
    }

    public function menunggu_konfirmasi()
    {
        $data['title'] = 'Menunggu Konfirmasi';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/transaksi_menunggu_konfirmasi', $data);
        $this->load->view('template_admin/footer');
    }

    public function sedang_disewa()
    {
        $data['title'] = 'Sedang Disewa';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/transaksi_sedang_disewa', $data);
        $this->load->view('template_admin/footer');
    }

    public function selesai()
    {
        $data['title'] = 'Transaksi Selesai';
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('template_admin/footer');
    }

    public function konfirmasi_pembayaran($id)
    {
        $this->load->model('transaksi_model');
        $id_transaksi = $id;
        $status_pembayaran = 2;

        $data = array(
            'status_pembayaran' => $status_pembayaran
        );
        $where = array(
            'id_transaksi' => $id_transaksi
        );

        $this->transaksi_model->edit_data('transaksi', $data, $where);

        echo "<script>window.location='" . base_url('admin/transaksi/menunggu_konfirmasi') . "';</script>";
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama Customer', 'required');
        $this->form_validation->set_rules('merk_mobil', 'Merk Mobil', 'required');
        $this->form_validation->set_rules('tgl_sewa', 'Tanggal Sewa', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }

    // laporan
    function laporan()
    {
        $data['title'] = 'Laporan Transaksi';

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == true) {
            $data['laporan'] = $this->db->query("select * from transaksi, mobil, user where transaksi.id_mobil=mobil.id_mobil and transaksi.id_user=user.id_user and date(tanggal_sewa) >= '$dari'")->result();
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/laporan_filter_transaksi', $data);
            $this->load->view('template_admin/footer');
        } else {
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
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
            $data['laporan'] = $this->db->query("select * from transaksi, mobil, user where transaksi.id_mobil=mobil.id_mobil and transaksi.id_user=user.id_user and date(tanggal_sewa) >= '$dari'")->result();
            $this->load->view('admin/laporan_transaksi_print', $data);
        } else {
            redirect('admin/laporan', 'refresh');
        }
    }
}
