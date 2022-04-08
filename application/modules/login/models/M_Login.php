<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{
	public function get_pengumuman(){
		$query = "SELECT user.*,pengumuman.* 
					FROM pengumuman 
					LEFT JOIN user 
					on pengumuman.user_id=user.id
					order by pengumuman.tgl_pengumuman desc"
        ;
        return $this->db->query($query)->result_array();
	}
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
}