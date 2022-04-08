<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Website extends CI_Model
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
	public function get_kelas(){
		$id = $this->session->userdata('id_guru');
		$query = "SELECT COUNT(id) as kelas 
		FROM `kelas_guru` 
		WHERE `kelas_guru`.`guru_id`=$id";
        return $this->db->query($query)->row_array();
	}
	public function get_matapelajaran(){
		$id = $this->session->userdata('id_guru');
		$query = "SELECT `guru`.*,`matpel`.* 
					FROM `guru`
					LEFT JOIN `matpel`
					ON `matpel`.`id_matpel`=`guru`.`matpel_id`
					WHERE `guru`.`id_guru`= $id";
        return $this->db->query($query)->row_array();
	}
	public function get_soal(){
		$id = $this->session->userdata('id_guru');
		$query = "SELECT COUNT(id_soal) as soal 
		FROM `tb_soal` 
		WHERE `tb_soal`.`guru_id`=$id";
        return $this->db->query($query)->row_array();
	}
}