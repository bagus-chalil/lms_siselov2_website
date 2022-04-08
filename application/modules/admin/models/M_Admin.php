<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    function getUser(){
        $query = 
        "SELECT user_role.role AS role,COUNT(user.role_id) AS position 
         FROM user 
         JOIN user_role 
         ON user.role_id=user_role.id 
         GROUP BY (user_role.id)";
    return $this->db->query($query);
    }
    function getJumlahUser(){
        $query = 
        "SELECT COUNT(id) as jml_user FROM user";
    return $this->db->query($query);
    }
    function getJumlahPengumuman(){
        $query = 
        "SELECT COUNT(id_pengumuman) as jml_pengumuman FROM pengumuman";
    return $this->db->query($query);
    }
    function getPengumuman(){
        $query = 
        "SELECT COUNT(id_pengumuman) as jml_pengumuman FROM pengumuman where status_pengumuman =1";
    return $this->db->query($query);
    }
    function getAlat(){
        $query = 
        "SELECT COUNT(id) as jml_alat FROM alat_praktikum where stok >0";
    return $this->db->query($query);
    }
    function getJumlahAlat(){
        $query = 
        "SELECT COUNT(id) as jml_alat FROM alat_praktikum";
    return $this->db->query($query);
    }
    function getJumlahKelas(){
        $query = 
        "SELECT COUNT(id_kelas) as jml_kelas FROM kelas";
    return $this->db->query($query);
    }
    function getJumlahMapel(){
        $query = 
        "SELECT COUNT(id_matpel) as jml_mapel FROM matpel";
    return $this->db->query($query);
    }
}