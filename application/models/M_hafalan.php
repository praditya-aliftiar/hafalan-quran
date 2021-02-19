<?php

class M_hafalan extends CI_Model
{
    public function get_hafalan()
    {
        return $this->db->count_all_results('hafalan');
    }

    public function get_hafalan_personal($nis)
    {
        $this->db->where('nis', $nis);
        return $this->db->count_all_results('hafalan');
    }

    public function get_hafalan_by_nis($nis)
    {
        $this->db->where('nis', $nis);
        return $this->db->get('hafalan');
    }

    public function get_hafalan_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('hafalan');
    }

    public function delete_hafalan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('hafalan');
    }

    public function update_hafalan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('hafalan', $data);
    }

    public function get_hafalan_by_date($tgl_awal, $tgl_akhir)
    {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);

        $this->db->where('DATE(tanggal) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir);

        return $this->db->get('hafalan')->result();
    }
}
