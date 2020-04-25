<?php

class Data_Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('pesan_model');
        $this->load->model('mobil_model');
    }

    public function index()
    {
        $data['title'] = 'Data Mobil';
        $data['mobil'] = $this->mobil_model->get_data_type('mobil')->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/data_mobil', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_mobil()
    {
        $data['title'] = 'Form Tambah Data Mobil';
        $data['type'] = $this->mobil_model->get_data('type')->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/form_tambah_mobil', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_mobil_simpan()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mobil();
        } else {
            $id_type       = $this->input->post('id_type');
            $merk          = $this->input->post('merk');
            $no_plat       = $this->input->post('no_plat');
            $warna         = $this->input->post('warna');
            $tahun         = $this->input->post('tahun');
            $harga         = $this->input->post('harga');
            $denda         = $this->input->post('denda');
            $ac            = $this->input->post('ac');
            $supir         = $this->input->post('supir');
            $audio_player  = $this->input->post('audio_player');
            $central_lock  = $this->input->post('central_lock');
            $status_mobil  = $this->input->post('status_mobil');
            $gambar        = $_FILES['gambar']['name'];
            if ($gambar = '') {
            } else {
                $config['upload_path'] = './assets/upload/mobil';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Gambar Mobil Gagal Di-Upload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id_type'      => $id_type,
                'merk'         => $merk,
                'no_plat'      => $no_plat,
                'tahun'        => $tahun,
                'warna'        => $warna,
                'harga'        => $harga,
                'denda'        => $denda,
                'ac'           => $ac,
                'supir'        => $supir,
                'audio_player' => $audio_player,
                'central_lock' => $central_lock,
                'status_mobil' => $status_mobil,
                'gambar'       => $gambar
            );

            $this->mobil_model->insert_data($data, 'mobil');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mobil Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/data_mobil');
        }
    }

    public function edit_mobil($id)
    {
        $where = array('id_mobil' => $id);
        $data['title'] = 'Form Ubah Data Mobil';
        $data['mobil'] = $this->db->query("SELECT * FROM mobil mb, type tp WHERE mb.id_type=tp.id_type AND mb.id_mobil='$id'")->result();
        $data['type'] = $this->mobil_model->get_data('type')->result();
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/form_edit_mobil', $data);
        $this->load->view('template_admin/footer');
    }

    public function edit_mobil_simpan()
    {
        $this->_rules();
        $id = $this->input->post('id_mobil');
        if ($this->form_validation->run() == FALSE) {
            $this->edit_mobil($id);
        } else {
            $id_type       = $this->input->post('id_type');
            $merk          = $this->input->post('merk');
            $no_plat       = $this->input->post('no_plat');
            $warna         = $this->input->post('warna');
            $tahun         = $this->input->post('tahun');
            $harga         = $this->input->post('harga');
            $denda         = $this->input->post('denda');
            $ac            = $this->input->post('ac');
            $supir         = $this->input->post('supir');
            $audio_player  = $this->input->post('audio_player');
            $central_lock  = $this->input->post('central_lock');
            $status_mobil  = $this->input->post('status_mobil');
            $gambar        = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['upload_path'] = './assets/upload/mobil';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'id_type'      => $id_type,
                'merk'         => $merk,
                'no_plat'      => $no_plat,
                'tahun'        => $tahun,
                'warna'        => $warna,
                'harga'        => $harga,
                'denda'        => $denda,
                'ac'           => $ac,
                'supir'        => $supir,
                'audio_player' => $audio_player,
                'central_lock' => $central_lock,
                'status_mobil' => $status_mobil
            );

            $where = array(
                'id_mobil' => $id
            );

            $this->mobil_model->edit_data('mobil', $data, $where);
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mobil Berhasil Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/data_mobil');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_type', 'Kode Type', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('status_mobil', 'Status', 'required');
    }

    public function detail_mobil($id)
    {
        $data['title'] = 'Detail Mobil';
        $data['detail'] = $this->mobil_model->ambil_id_mobil($id);
        $data['pesan'] = $this->pesan_model->get_data_user('pesan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/detail_mobil', $data);
        $this->load->view('template_admin/footer');
    }

    public function delete_mobil($id)
    {
        $where = array('id_mobil' => $id);
        $this->mobil_model->delete_data($where, 'mobil');
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Mobil Berhasil Dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/data_mobil');
    }

    //fitur print laporan
    function laporan_print()
    {
        $data['title'] = 'Laporan Mobil yang Tersedia';
        $data['mobil'] = $this->mobil_model->get_data_type('mobil')->result();
        $this->load->view('admin/laporan_mobil_print', $data);
    }
}
