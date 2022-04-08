<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Guru extends CI_Model
{
	public function user_login($email){
		$query = "SELECT `user`.*,`siswa`.*,`guru`.* 
					FROM `user`
					LEFT JOIN `siswa`
					ON `siswa`.`user_id`=`user`.`id`
					LEFT JOIN `guru`
					ON `guru`.`user_id`=`user`.`id`
					WHERE `user`.`email`= '$email'";
        return $this->db->query($query)->row_array();
	}
    public function get_kelas_guru(){
        $data= $this->session->userdata('nip');
		$query = "SELECT `kelas`.*,`guru`.*,`matpel`.*,`kelas_guru`.* 
					FROM `guru`  
					LEFT JOIN `kelas_guru`
					on `kelas_guru`.`guru_id`=`guru`.`id_guru`
					LEFT JOIN `kelas` 
					on `kelas`.`id_kelas`=`kelas_guru`.`kelas_id` 
					LEFT JOIN `matpel`
					on `matpel`.`id_matpel`=`guru`.`matpel_id`
					Where `guru`.`nip` = $data 
				";
        return $this->db->query($query)->result_array();
	}
    public function get_kelas_mapel($kelas_id){
        $data= $this->session->userdata('nip');
		$query = "SELECT `m_mapel`.*,`matpel`.*,`kelas`.* 
					FROM `m_mapel`
					LEFT JOIN `kelas` on `kelas`.`id_kelas`=`m_mapel`.`kelas_id`
					LEFT JOIN `matpel` on `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
					WHERE `m_mapel`.`author`=$data
					AND `m_mapel`.`kelas_id`=$kelas_id";
        return $this->db->query($query)->result_array();
	}
	public function get_hapus_tugasId($id_tugas){
		$row = $this->db->where('id_tugas',$id_tugas)->get('tugas')->row();
		unlink(FCPATH. './assets/Dokumen/tugas/' . $row->dokumen_tugas);
        $this->db->where('id_tugas', $id_tugas);
        $this->db->delete('tugas');
        return true; 
	}
	public function get_mapel_absen($id){
		$query = "SELECT `absensi_siswa`.*,`absensi`.*,`user`.`name`,`user`.`role_id`,`m_mapel`.`id_m_mapel`,`kelas`.*,`matpel`.*,`siswa`.*
		FROM `user`
		LEFT JOIN `siswa` 
		on `user`.`id`=`siswa`.`user_id`
		LEFT JOIN `absensi_siswa` 
		ON `absensi_siswa`.`nisn`=`siswa`.`nisn`
		LEFT JOIN `absensi` 	
		ON `absensi`.`id_absen`=`absensi_siswa`.`absen_id`
		LEFT JOIN `m_mapel` 
		ON `m_mapel`.`id_m_mapel`=`absensi`.`m_mapel_id`
		LEFT JOIN `matpel` 
		ON `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
        LEFT JOIN `kelas`
        ON `kelas`.`id_kelas`=`m_mapel`.`kelas_id`
		WHERE `user`.`role_id`=3 and `m_mapel`.`id_m_mapel`='$id'
        order by `siswa`.`nisn` DESC";
        return $this->db->query($query)->result_array();
	}
	
	public function get_mapel_tugas($id){
		$query = "SELECT `tugas_siswa`.*,`tugas`.*,`user`.`name`,`user`.`role_id`,`m_mapel`.`id_m_mapel`,`kelas`.*,`matpel`.*,`siswa`.*
		FROM `user`
		LEFT JOIN `siswa` 
		on `user`.`id`=`siswa`.`user_id`
		LEFT JOIN `tugas_siswa` 
		ON `tugas_siswa`.`nisn`=`siswa`.`nisn`
		LEFT JOIN `tugas` 
		ON `tugas`.`id_tugas`=`tugas_siswa`.`tugas_id`
		LEFT JOIN `m_mapel` 
		ON `m_mapel`.`id_m_mapel`=`tugas`.`m_mapelId`
		LEFT JOIN `matpel` 
		ON `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
        LEFT JOIN `kelas`
        ON `kelas`.`id_kelas`=`m_mapel`.`kelas_id`
		WHERE `user`.`role_id`=3 and `m_mapel`.`id_m_mapel`='$id'
        order by `tugas`.`m_mapelId` DESC";
        return $this->db->query($query)->result_array();
	}
	public function get_tugas($id){
		$query = "SELECT `tugas`.*,`m_mapel`.*,`matpel`.* 
					FROM `tugas` 
					LEFT JOIN `m_mapel` 
					ON `m_mapel`.`id_m_mapel`=`tugas`.`m_mapelId`
					LEFT JOIN `matpel` 
					ON `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
					where `m_mapelId` = '$id'";
        return $this->db->query($query)->result_array();
	}
	public function get_data_tugas($id_tugas){
		$query = "SELECT `tugas`.*,`m_mapel`.* 
					FROM `tugas` 
					LEFT JOIN `m_mapel` 
					ON `m_mapel`.`id_m_mapel`=`tugas`.`m_mapelId`
					where `tugas`.`id_tugas` = '$id_tugas'";
        return $this->db->query($query)->row_array();
	}
	public function get_absensi($id){
		$query = "SELECT `absensi`.*,`m_mapel`.*,`matpel`.* 
					FROM `absensi` 
					LEFT JOIN `m_mapel` 
					ON `m_mapel`.`id_m_mapel`=`absensi`.`m_mapel_id`
					LEFT JOIN `matpel` 
					ON `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
					where `m_mapel_id` = '$id'";
        return $this->db->query($query)->result_array();
	}
	public function get_jml_siswa(){
		$query = "SELECT COUNT(id) as siswa 
		FROM `user` 
		LEFT JOIN `siswa`
		on `user`.`id`=`siswa`.`user_id`
		WHERE `user`.`role_id`=3 and `siswa`.`kelas_id`=2";
        return $this->db->query($query)->row_array();
	}
	public function get_jml_absen($id){
		$query = "SELECT COUNT(id) as absen FROM `absensi_siswa`
		LEFT JOIN `absensi` 
		ON `absensi`.`id_absen`=`absensi_siswa`.`absen_id`
		WHERE `m_mapel_id`='$id'";
        return $this->db->query($query)->row_array();
	}
	public function get_jml_tugas($id){
		$query = "SELECT COUNT(id) as tugasi FROM `tugas_siswa`
		LEFT JOIN `tugas` 
		ON `tugas`.`id_tugas`=`tugas_siswa`.`tugas_id`
		WHERE `m_mapelId`='$id'";
        return $this->db->query($query)->row_array();
	}
}
