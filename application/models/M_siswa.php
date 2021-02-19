<?php

class M_siswa extends CI_Model
{

    public function get_siswa()
    {
        return $this->db->count_all_results('siswa');
    }

    public function get_siswa_by_nis($nis)
    {
        $this->db->where('nis', $nis);
        return $this->db->get('siswa');
    }

    // public function getSiswaByNis($nis)
    // {
    //     $this->db->where('nis', $nis);
    //     $this->db->from('siswa');
    //     $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
    //     $query = $this->db->get();
    //     return $query;
    // }



    // public function insert($data)
    // {
    //     return $this->db->insert('siswa', $data);
    // }

    // public function update($nis, $data)
    // {
    //     $this->db->where('nis', $nis);
    //     $this->db->update('siswa', $data);
    // }

    // public function delete($where, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }
}
