<?php
defined('BASEPATH') or exit('No direct script access allowed');

class landingmodel extends CI_model
{
    public function getdata($params)
    {
        $sql = "SELECT pb.idProsiding, e.topic, pb.year,  pb.title,  pb.ProsidingFile, pb.ProsidingImg
                FROM prosidingbook pb JOIN event e ON pb.IdEvent = e.IdEvent
                WHERE pb.idProsiding = ?
                ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function getallprosiding()
    {
        $sql = "SELECT pb.idProsiding, e.topic, pb.year, pb.title,  pb.ProsidingFile, pb.ProsidingImg
                FROM prosidingbook pb JOIN event e ON pb.IdEvent = e.IdEvent";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    public function getprosiding()
    {
        $tahun = date("Y");
        $sql = "SELECT pb.idProsiding, e.topic, pb.year,pb.title,  pb.ProsidingFile, pb.ProsidingImg
                FROM prosidingbook pb JOIN event e ON pb.IdEvent = e.IdEvent
                WHERE pb.year = '$tahun'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function getPaymentKategori()
    {
        $tahun = date("Y");
        $sql = "SELECT biaya, kategori from event where statusEvent='Aktif' and YEAR(tanggalAkhir)=$tahun";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function getEventAktif()
    {
        $tahun = date("Y");
        $sql = " SELECT subevent.ketegori, subevent.tanggalAwal, subevent.tanggalAkhir from event join subevent on event.IdEvent = subevent.IdEvent where event.statusEvent='Aktif' and YEAR(event.tanggalAkhir)='$tahun'";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
}
