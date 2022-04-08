<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function Mdelete_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
    }
    
	public function get_user_level_siswa($id){
		$query = "SELECT `user`.*,`user_role`.`id` as `id_level`,`user_role`.`role`,
					`kelas`.*,`guru`.*,`matpel`.*,`siswa`.* 
					FROM `user` 
					LEFT JOIN `siswa` 
					on `user`.`id`=`siswa`.`user_id` 
					LEFT JOIN `user_role` 
					on `user`.`role_id`=`user_role`.`id` 
					LEFT JOIN `kelas` 
					on `kelas`.`id_kelas`=`siswa`.`kelas_id` 
					LEFT JOIN `guru`
					on `guru`.`id_guru`=`siswa`.`wali_kelas`
					LEFT JOIN `matpel`
					on `matpel`.`id_matpel`=`guru`.`matpel_id`
					WHERE `user`.`role_id`= $id 
					ORDER BY `user_role`.`role` ASC
        			";
        return $this->db->query($query)->result_array();
	}
	public function get_user_level_guru($id){
		$query = "SELECT `user`.*,`user_role`.`id` as `id_level`,`user_role`.`role`,
					`guru`.*,`matpel`.*
					FROM `user` 
					LEFT JOIN `guru` 
					on `user`.`id`=`guru`.`user_id` 
					LEFT JOIN `user_role` 
					on `user`.`role_id`=`user_role`.`id`  
					LEFT JOIN `matpel`
					on `matpel`.`id_matpel`=`guru`.`matpel_id`
					WHERE `user`.`role_id`= $id 
					ORDER BY `user_role`.`role` ASC
        ";
        return $this->db->query($query)->result_array();
	}
	public function get_user_verifikasi($id){
		$query = "SELECT `user`.*,`user_role`.`id` as ur,`user_role`.`role`,`identitas`.* 
					FROM `user` 
					LEFT JOIN `user_role`
					on `user`.`role_id`=`user_role`.`id` 
					LEFT JOIN `identitas` 
					on `user`.`identitas_id`=`identitas`.`id_identitas` 
					WHERE `user`.`identitas_id`=$id 
        ";
        return $this->db->query($query)->result_array();
	}
	public function get_user_role(){
		$this->db->select('*');
		$this->db->from('user_role');
		$this->db->where('id !=',1);
		$query = $this->db->get();
		return $query;
	}
	public function get_user_role_verifikasi(){
		$query = "SELECT `user_role`.*
					FROM `user_role` 
					WHERE `user_role`.`id`= 2 or `user_role`.`id`= 3 
					ORDER BY `user_role`.`role` ASC
        ";
        return $this->db->query($query)->result_array();
	}
    public function get_user_levelId(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_role', 'user.role_id=user_role.id');
		$this->db->where('');
		$query = $this->db->get();
		return $query;
	}

	public function ubah_userLevel($data1)
    {
        $this->db->where('id',$this->input->post('user_id'));
        return $this->db->update('user',$data1);
    }

	public function ubah_userLevel1($data1)
    {
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('user',$data1);
    }
}