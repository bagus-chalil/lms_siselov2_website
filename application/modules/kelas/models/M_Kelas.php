<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kelas extends CI_Model
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
    public function get_kelas_online($nisn){
		$query = "SELECT `user`.*,`matpel`.*,`kelas_matpel`.*,`guru`.* 
					FROM `user` 
					LEFT JOIN `siswa` 
					on `siswa`.`user_id`=`user`.`id`
					LEFT JOIN `guru`
					on `guru`.`id_guru`=`siswa`.`wali_kelas` 
					LEFT JOIN `kelas_matpel` 
					on `siswa`.`kelas_id`=`kelas_matpel`.`kelas_id` 
					LEFT JOIN `matpel` 
					on `kelas_matpel`.`matpel_id`=`matpel`.`id_matpel` 
                    Where `siswa`.`nisn` = $nisn 
        ";
        return $this->db->query($query)->result_array();
	}
	public function get_kelas_mapel($id_matpel){
		$data= $this->session->userdata('nisn');
		$query = "SELECT `m_mapel`.*,`matpel`.*,`kelas`.*,`siswa`.*
					FROM `m_mapel`
					LEFT JOIN `siswa` on `siswa`.`kelas_id`=`m_mapel`.`kelas_id` 
					LEFT JOIN `kelas` on `kelas`.`id_kelas`=`m_mapel`.`kelas_id`
					LEFT JOIN `matpel` on `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
					WHERE `m_mapel`.`mapel_id`=$id_matpel
					AND `siswa`.`nisn`=$data
				";
        return $this->db->query($query)->result_array();
	}
	public function getAbsenSiswa(){
		$data= $this->session->userdata('nisn');
		$query = "SELECT `absensi`.*,`absensi_siswa`.*
					FROM `absensi`
					LEFT JOIN `absensi_siswa`
					on `absensi`.`id_absen`=`absensi_siswa`.`absen_id`
					WHERE `absensi_siswa`.`nisn`=$data";
				
		return $this->db->query($query)->result_array();
	}
	public function getTugas($id_tugas){
		$data= $this->session->userdata('nisn');
		$query = "SELECT `siswa`.*,`m_mapel`.*,`tugas`.*,`guru`.*,`matpel`.*,`kelas`.*,`tugas_siswa`.*
					FROM `m_mapel`
					LEFT JOIN `kelas` on `kelas`.`id_kelas`=`m_mapel`.`kelas_id`
					LEFT JOIN `matpel` on `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
					LEFT JOIN `tugas` on `m_mapel`.`id_m_mapel`=`tugas`.`m_mapelId`
					LEFT JOIN `tugas_siswa` on `tugas_siswa`.`tugas_id`=`tugas`.`id_tugas`
					LEFT JOIN `siswa` on `siswa`.`kelas_id`=`m_mapel`.`kelas_id` 
					LEFT JOIN `guru` on `guru`.`nip`=`m_mapel`.`author`
					WHERE `tugas`.`id_tugas`=$id_tugas
					and `siswa`.`nisn`=$data";
		return $this->db->query($query)->row_array();
	}
	public function getTugasSiswa($id_tugas){
		$data= $this->session->userdata('nisn');
		$query = "SELECT `tugas`.*,`tugas_siswa`.*
					FROM `tugas`
					LEFT JOIN `tugas_siswa` ON `tugas_siswa`.`tugas_id`=`tugas`.`id_tugas`
					WHERE `tugas`.`tgs_active`=1 
					AND `tugas_siswa`.`nisn`=$data
					AND `tugas`.`id_tugas`=$id_tugas";
		return $this->db->query($query)->row_array();
	}
}
