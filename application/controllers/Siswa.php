<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // jalankan helper 
        // is_logged_in();

        // jika role = siswa maka tidak bisa akses controller guru via url
        if ($this->session->userdata('role') == 1) {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user']  = $this->db->get_where('siswa', ['username'
        => $this->session->userdata('username')])->row_array();

        $nis =  $this->session->userdata('nis');
        $data['hafalan'] = $this->M_hafalan->get_hafalan_personal($nis);

        $this->load->view('siswa/dashboard', $data);
    }

    public function data_hafalan()
    {
        $data['title'] = 'Data Hafalan';
        $data['user']  = $this->db->get_where('siswa', ['username'
        => $this->session->userdata('username')])->row_array();
        $data['hafalan']  = $this->db->get_where('hafalan', ['nis'
        => $this->session->userdata('nis')])->result();

        $this->load->view('siswa/data-hafalan', $data);
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('siswa/profile', $data);
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('siswa', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        // jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('siswa/edit-profile', $data);
        } else {
            // jika benar 
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');

            // cek jika ada gambar
            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    // hapus foto lama
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    // upload foto baru
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            // masukan ke database
            $this->db->set('nama', $nama);
            $this->db->where('username', $username);
            $this->db->update('siswa');

            $this->session->set_flashdata('update-success', 'Berhasil');
            redirect('siswa/profile');
        }
    }
}
