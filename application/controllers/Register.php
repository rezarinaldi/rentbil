<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Register';

        $this->load->view('register', $data);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim', [
            'required' => 'Gender Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|trim|numeric', [
            'required' => 'No. Telepon Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('no_ktp', 'No. Ktp', 'required|trim', [
            'required' => 'No. Ktp Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim', [
            'required' => 'Confirm Password Tidak Boleh Kosong'
        ]);
    }

    public function tambah_user_simpan_customer()
    {
        $this->load->model('user_model');

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $alamat = $this->input->post('alamat');
        $gender = $this->input->post('gender');
        $no_telp = $this->input->post('no_telp');
        $no_ktp = $this->input->post('no_ktp');
        $level = 2;

        $scan_ktp = $_FILES['scan_ktp']['name'];

        if ($scan_ktp = '') {
        } else {
            $config['upload_path'] = './assets/upload/user';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('scan_ktp')) {
                echo "Scan KTP user Gagal Di-Upload";
            } else {
                $scan_ktp = $this->upload->data('file_name');
            }
        }

        $scan_kk = $_FILES['scan_kk']['name'];
        
        if ($scan_kk = '') {
        } else {
            $config['upload_path'] = './assets/upload/user';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('scan_kk')) {
                echo "Scan KK user Gagal Di-Upload";
            } else {
                $scan_kk = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'alamat' => $alamat,
            'gender' => $gender,
            'no_telp' => $no_telp,
            'no_ktp' => $no_ktp,
            'scan_ktp' => $scan_ktp,
            'scan_kk' => $scan_kk,
            'level' => $level
        );

        $this->user_model->insert_data($data, 'user');
        // $this->session->set_flashdata('pesan','
        //     <div class="alert alert-success alert-dismissible fade show" role="alert">
        //     Data user Berhasil Ditambahkan
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //     <span aria-hidden="true">&times;</span>
        //     </button>
        //     </div>');
        echo "<script>
                    alert('Register Berhasil, Silahkan Login');
                    window.location='" . site_url('auth/login') . "';
                </script>";

        // echo "<script>alert('Anda Berhasil Registrasi')</script>";
        // redirect('auth/login');

    }
}

/* End of file Register.php */
