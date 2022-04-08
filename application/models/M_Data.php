<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

defined('BASEPATH') or exit('No direct script access allowed');

class M_Data extends CI_Model
{
    
   public function user_login($email){
      $query = "SELECT `user`.*,`siswa`.*,`guru`.*,`kelas`.*
					FROM `user`
					LEFT JOIN `siswa`
					ON `siswa`.`user_id`=`user`.`id`
					LEFT JOIN `guru`
					ON `guru`.`id_guru`=`siswa`.`wali_kelas`
               LEFT JOIN `kelas`
					ON `kelas`.`id_kelas`=`siswa`.`kelas_id`
					WHERE `user`.`email`= '$email'";
        return $this->db->query($query)->row();
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
        return $this->db->query($query)->result();
	}
   public function get_absensi($nisn){
		$query = "SELECT `absensi`.*,`matpel`.*,`kelas`.`nama_kelas`, 
					(SELECT COUNT(id) FROM `absensi_siswa` WHERE `absensi_siswa`.`nisn` = 99999991 AND `absensi`.`id_absen` = `absensi_siswa`.`absen_id`) AS ada 
					FROM `absensi` 
					LEFT JOIN `m_mapel` ON `m_mapel`.`id_m_mapel`=`absensi`.`m_mapel_id` 
					LEFT JOIN `matpel` ON `m_mapel`.`mapel_id`=`matpel`.`id_matpel` 
					LEFT JOIN `kelas` ON `kelas`.`id_kelas`=`m_mapel`.`kelas_id` 
					WHERE `absensi_active`=1 GROUP BY `absensi`.`id_absen` 
					HAVING `ada`=0";
        return $this->db->query($query)->result();
	}
   public function get_tugas($nisn){
		$query = "SELECT `absensi`.*,`matpel`.*,
					(SELECT COUNT(id) FROM `absensi_siswa`
					WHERE `absensi_siswa`.`nisn` = $nisn 
					AND `absensi`.`id_absen` = `absensi_siswa`.`absen_id`) AS ada
					FROM `absensi` 
					LEFT JOIN `m_mapel`
					ON `m_mapel`.`id_m_mapel`=`absensi`.`m_mapel_id`
					LEFT JOIN `matpel`
					ON `m_mapel`.`mapel_id`=`matpel`.`id_matpel`
					WHERE `absensi_active`=1
					GROUP BY `absensi`.`id_absen`
					HAVING `ada`=0";
        return $this->db->query($query)->result();
	}
	
}
?>