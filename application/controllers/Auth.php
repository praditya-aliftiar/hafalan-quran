<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // jika validasi berhasil
            $this->_login();
        }
    }

    private function _login()
    {
        $role     = $this->input->post('role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // cari data di tabel user berdasarkan username 
        if ($role !== 'Siswa') {
            $user = $this->db->get_where('guru', ['username' => $username])->row_array();
        } else {
            $user = $this->db->get_where('siswa', ['username' => $username])->row_array();
        }

        if ($user) {
            // jika password yg diinput sama dgn didatabase
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role'     => $user['role'],
                    'nis'     => $user['nis']
                ];
                // buat sesssion berdsarkan $data
                $this->session->set_userdata($data);

                if ($user['role'] == 1) {
                    redirect('guru');
                } else {
                    redirect('siswa');
                }
            } else {
                // jika password yg diinput tidak sesuai dengan didatabase
                // tampilkan flashdata password salah
                $this->session->set_flashdata('login-failed-1', 'Gagal');
                redirect('auth');
            }
        } else {
            // username dan passsword salah
            // tampilkan pesan error
            $this->session->set_flashdata('login-failed-2', 'Gagal');
            redirect('auth');
        }
    }

    public function registration()
    {
        // set validasi form
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|max_length[12]');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[25]');

        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|max_length[15]|is_unique[siswa.username]', [
            'is_unique' => 'Username has already registered!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password to short, min 6 words!'
        ]);

        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        // jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            // jika validasi benar
            $this->registration_act();
        }
    }

    public function registration_act()
    {
        $data = [
            'nis'      => htmlspecialchars($this->input->post('nis')),
            'nama'      => htmlspecialchars($this->input->post('nama')),
            'kelas'     => htmlspecialchars($this->input->post('kelas')),
            'username'  => htmlspecialchars($this->input->post('username')),
            'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'foto'     => 'default.jpg',
            'role'     => 2
        ];

        $this->db->insert('siswa', $data);

        $this->session->set_flashdata('register-success', 'Berhasil');
        redirect('auth');
    }


    public function logout()
    {
        // hapus session
        $this->session->unset_userdata('username');

        // tampilkan flash message
        $this->session->set_flashdata('logout-success', 'Berhasil');
        redirect('auth');
    }


    // public function blocked()
    // {
    //     $data['title'] = '404 error';

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('auth/blocked');
    // }
}
