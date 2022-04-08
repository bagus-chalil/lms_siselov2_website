<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Praktikum extends CI_Model
{
    public function get_alat(){
		$query = "SELECT `alat_praktikum`.*,`matpel`.`nama_matpel`,`kelas`.`nama_kelas`
					FROM `alat_praktikum`
					LEFT JOIN `matpel` 
					on `matpel`.`id_matpel`=`alat_praktikum`.`matpel_id` 
					LEFT JOIN `kelas` 
					on `kelas`.`id_kelas`=`alat_praktikum`.`kelas_id`"; 
        ;
        return $this->db->query($query)->result_array();
	}
    public function get_detail_alat($id){
		$query = "SELECT `alat_praktikum`.*,`matpel`.`nama_matpel`,`kelas`.`nama_kelas`
					FROM `alat_praktikum`
					LEFT JOIN `matpel` 
					on `matpel`.`id_matpel`=`alat_praktikum`.`matpel_id` 
					LEFT JOIN `kelas` 
					on `kelas`.`id_kelas`=`alat_praktikum`.`kelas_id`
                    WHERE `alat_praktikum`.`id`=$id"; 
        ;
        return $this->db->query($query)->row_array();
	}
    public function get_hapus_id($id){
		$row = $this->db->where('id',$id)->get('alat_praktikum')->row();
		unlink(FCPATH. './assets/images/alat/' . $row->gambar);
        $this->db->where('id', $id);
        $this->db->delete('alat_praktikum');
        return true; 
	}
	public function get_alat_user(){
		$user=$this->session->userdata('nisn');
		$query = "SELECT `alat_praktikum`.*,`matpel`.`nama_matpel`,`kelas`.`nama_kelas`,`user`.`nisn`,`user`.`kelas_id`,
					(SELECT COUNT(`alat_praktikum`) FROM `tb_pinjam_alat` 
					WHERE `tb_pinjam_alat`.`nisn` = $user AND `tb_pinjam_alat`.`alat_id` = `alat_praktikum`.`id`) AS ada
					FROM `alat_praktikum`
					LEFT JOIN `matpel` 
					on `matpel`.`id_matpel`=`alat_praktikum`.`matpel_id` 
					LEFT JOIN `kelas` 
					on `kelas`.`id_kelas`=`alat_praktikum`.`kelas_id`
					LEFT JOIN `user`
					on `user`.`kelas_id`=`kelas`.`id_kelas`
					WHERE `user`.`nisn`=$user and `alat_praktikum`.`stok`>0"; 
        return $this->db->query($query)->result_array();
	}
}
