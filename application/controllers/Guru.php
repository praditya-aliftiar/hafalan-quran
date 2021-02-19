<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // jalankan helper 
        // is_logged_in();

        // jika role = siswa maka tidak bisa akses controller guru via url
        // if ($this->session->userdata('role') == 'siswa') {
        //     redirect('auth/blocked');
        // }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user']  = $this->db->get_where('guru', ['username'
        => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->M_siswa->get_siswa();
        $data['hafalan'] = $this->M_hafalan->get_hafalan();

        $this->load->view('guru/dashboard', $data);
    }


    public function registration()
    {
        // set validasi form
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|max_length[12]');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[25]');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|max_length[15]|is_unique[guru.username]', [
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
            $this->load->view('guru/registration', $data);
        } else {
            // jika validasi benar
            $this->registration_act();
        }
    }

    public function registration_act()
    {
        $data = [
            'nip'      => htmlspecialchars($this->input->post('nip')),
            'nama'      => htmlspecialchars($this->input->post('nama')),
            'username'  => htmlspecialchars($this->input->post('username')),
            'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'foto'     => 'default.jpg',
            'role'      => 1
        ];
        $this->db->insert('guru', $data);

        $this->session->set_flashdata('register-success', 'Berhasil');
        redirect('auth');
    }

    public function data_siswa()
    {
        $data['title'] = 'Data Siswa';
        $data['user']  = $this->db->get_where('guru', ['username'
        => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->result();

        $this->load->view('guru/data-siswa', $data);
    }

    public function detail_siswa($nis)
    {
        $data['title'] = 'Detail Siswa';
        $data['user']  = $this->db->get_where('guru', ['username'
        => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->M_siswa->get_siswa_by_nis($nis)->result();
        $data['hafalan'] = $this->M_hafalan->get_hafalan_by_nis($nis)->result();

        $this->load->view('guru/detail-siswa', $data);
    }

    public function data_hafalan()
    {
        $data['title'] = 'Data Hafalan';
        $data['user']  = $this->db->get_where('guru', ['username'
        => $this->session->userdata('username')])->row_array();
        $data['hafalan'] = $this->db->get('hafalan')->result();

        // $this->load->view('guru/data-hafalan', $data);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('surah', 'Surah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        // jika validasi gagal
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/data-hafalan', $data);
        } else {
            // jika validasi form berhasil
            $data = [
                'tanggal'   => $this->input->post('tanggal'),
                'nis'       => $this->input->post('nis'),
                'nama'      => $this->input->post('nama'),
                'kelas'     => $this->input->post('kelas'),
                'surah'     => $this->input->post('surah'),
                'keterangan' => $this->input->post('keterangan')
            ];
            // input ke database dengan model
            $this->db->insert('hafalan', $data);

            $this->session->set_flashdata('add-success', 'Berhasil');
            redirect('guru/data_hafalan');
        }
    }

    public function update_hafalan($id)
    {
        $data['title'] = 'Update Hafalan';
        $data['user']  = $this->db->get_where('guru', ['username'
        => $this->session->userdata('username')])->row_array();
        $data['hafalan'] = $this->M_hafalan->get_hafalan_by_id($id)->result();

        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('nis', 'Nis', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('surah', 'Surah', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('guru/update-hafalan', $data);
        } else {
            $this->update_hafalan_act();
        }
    }


    public function update_hafalan_act()
    {
        $id   = $this->input->post('id');
        $data = [
            'tanggal'     => $this->input->post('tanggal'),
            'nis'         => $this->input->post('nis'),
            'nama'        => htmlspecialchars($this->input->post('nama')),
            'kelas'       => htmlspecialchars($this->input->post('kelas')),
            'surah'       => htmlspecialchars($this->input->post('surah')),
            'keterangan'  => htmlspecialchars($this->input->post('keterangan'))
        ];

        $this->M_hafalan->update_hafalan($id, $data);

        $this->session->set_flashdata('update-success', 'Berhasil');
        redirect('guru/data_hafalan');
    }


    public function delete_hafalan($id)
    {
        $this->M_hafalan->delete_hafalan($id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
                <strong>Data Hafalan berhasil dihapus!</strong>
            </div>'
        );
        redirect('guru/data_hafalan');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('guru/profile', $data);
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        // jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/edit-profile', $data);
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
            $this->db->update('guru');

            $this->session->set_flashdata('update-success', 'Berhasil');
            redirect('guru/profile');
        }
    }

    public function laporan_hafalan()
    {
        $data['title']      = 'Laporan Hafalan';
        $data['user']       = $this->db->get_where('guru', ['username'
        => $this->session->userdata('username')])->row_array();

        $tgl_awal   = $this->input->get('tgl_awal');
        $tgl_akhir  = $this->input->get('tgl_akhir');

        // jika tgl awal dan akhir kosong
        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $label      = 'Semua Data Hafalan';
            $hafalan     = $this->db->get('hafalan')->result();
            $url_cetak  = 'guru/print_hafalan';
        } else { // Jika terisi
            $hafalan     = $this->M_hafalan->get_hafalan_by_date($tgl_awal, $tgl_akhir);
            $url_cetak  = 'guru/print_hafalan?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir; // Set URL untuk Cetak PDF
            $tgl_awal   = date('d-M-Y', strtotime($tgl_awal));
            $tgl_akhir  = date('d-M-Y', strtotime($tgl_akhir));
            $label      = 'Periode: ' . $tgl_awal . ' s/d ' . $tgl_akhir; // Set Label
        }
        $data['hafalan']    = $hafalan;
        $data['url_cetak']  = base_url($url_cetak);
        $data['label']      = $label;

        $this->load->view('guru/laporan-hafalan', $data);
    }

    public function print_hafalan()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $hafalan = $this->db->get('hafalan')->result();
            $label = 'Semua Data Hafalan';
        } else {
            $hafalan = $this->M_hafalan->get_hafalan_by_date($tgl_awal, $tgl_akhir);
            $tgl_awal = date('d-M-Y', strtotime($tgl_awal));
            $tgl_akhir = date('d-M-Y', strtotime($tgl_akhir));
            $label = 'Periode: ' . $tgl_awal . ' s/d ' . $tgl_akhir;
        }

        $data['label'] = $label;
        $data['hafalan'] = $hafalan;
        ob_start();
        $this->load->view('guru/print-hafalan', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require './assets/libraries/html2pdf/autoload.php'; // Load plugin html2pdfnya

        $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');  // Settingan PDFnya
        $pdf->WriteHTML($html);
        $pdf->Output('Laporan Hafalan.pdf', 'I');
    }
}
