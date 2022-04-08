<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{

    public function __construct()
    {
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    public function create($table, $data, $batch = false)
    {
        if ($batch === false) {
            $insert = $this->db->insert($table, $data);
        } else {
            $insert = $this->db->insert_batch($table, $data);
        }
        return $insert;
    }
    public function delete($table, $data, $pk)
    {
        $this->db->where_in($pk, $data);
        return $this->db->delete($table);
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

    public function getProfileSiswa(){
        $id=$this->session->userdata('id');
        $query = "SELECT `user`.*, `siswa`.*,`guru`.*,`kelas`.*
                    FROM `user` 
                    LEFT JOIN `siswa`
                    ON `user`.`id` = `siswa`.`user_id`
                    LEFT JOIN `guru`
                    ON `guru`.`id_guru` = `siswa`.`wali_kelas`
                    LEFT JOIN `kelas`
                    ON `kelas`.`id_kelas` = `siswa`.`kelas_id`
                    WHERE `user`.`id`=$id
        ";
        return $this->db->query($query)->row_array();
    }
    public function getProfileGuru(){
        $id=$this->session->userdata('id');
        $query = "SELECT `user`.*, `guru`.*,`matpel`.*,`kelas_guru`.*
                    FROM `user` 
                    LEFT JOIN `guru`
                    ON `user`.`id` = `guru`.`user_id`
                    LEFT JOIN `matpel`
                    ON `guru`.`matpel_id` = `matpel`.`id_matpel`
                    LEFT JOIN `kelas_guru`
                    ON `guru`.`id_guru` = `kelas_guru`.`guru_id`
                    WHERE `user`.`id`=$id
        ";
        return $this->db->query($query)->row_array();
    }
    public function getProfileAllGuru(){
        $query = "SELECT `user`.*, `guru`.*,`matpel`.*,`kelas_guru`.*
                    FROM `user` 
                    LEFT JOIN `guru`
                    ON `user`.`id` = `guru`.`user_id`
                    LEFT JOIN `matpel`
                    ON `guru`.`matpel_id` = `matpel`.`id_matpel`
                    LEFT JOIN `kelas_guru`
                    ON `guru`.`id_guru` = `kelas_guru`.`guru_id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getProfileGuest(){
        $id=$this->session->userdata('id');
        $query = "SELECT `user`.*,`identitas`.*
                    FROM `user`
                    LEFT JOIN `identitas` 
                    ON `identitas`.`id_identitas`=`user`.`identitas_id` 
                    WHERE `user`.`id`=$id
        ";
        return $this->db->query($query)->row_array();
    }
    public function cek_Kelas_guru(){
        $id=$this->session->userdata('nip');
        $query = "SELECT COUNT(id) as guru
                    FROM `kelas_guru`
                    LEFT JOIN `guru`
                    on `guru`.`id_guru`=`kelas_guru`.`guru_id`  
                    WHERE `guru`.`nip`= $id and `kelas_guru`.`kelas_id` > 0
        ";
        return $this->db->query($query)->row_array();
    }
    public function cek_matapelajaran_guru(){
        $id=$this->session->userdata('nip');
        $query = "SELECT COUNT(id) as matpel
                    FROM `kelas_guru`
                    LEFT JOIN `guru`
                    on `guru`.`id_guru`=`kelas_guru`.`guru_id`  
                    WHERE `guru`.`nip`= $id and `kelas_guru`.`matpel_id` > 0
        ";
        return $this->db->query($query)->row_array();
    }

    public function getKelasByGuru()
    {
        $id=$this->session->userdata('id');
        $query = "SELECT `user`.*, `guru`.*,`kelas_guru`.*,`kelas`.`id_kelas` 
                    FROM `user` 
                    LEFT JOIN `guru`
                    ON `user`.`id` = `guru`.`user_id`
                    LEFT JOIN `kelas_guru`
                    ON `guru`.`id_guru` = `kelas_guru`.`guru_id`
                    LEFT JOIN `kelas`
                    ON `kelas`.`id_kelas` = `kelas_guru`.`kelas_id`
                    WHERE `user`.`id`=$id";
        return $this->db->query($query)->result();
    }

    public function get_matpel(){
        $query="SELECT * FROM `kelas_guru`
                LEFT JOIN `guru`
                ON `kelas_guru`.`guru_id`=`guru`.`id_guru`";
        
        return $this->db->query($query)->result_array();
    }
    public function get_kelas_matpel(){
        $query="SELECT * FROM `kelas_guru`
                LEFT JOIN `kelas`
                ON `kelas_guru`.`kelas_id`=`kelas`.`id_kelas`
                LEFT JOIN `matpel`
                ON `kelas_guru`.`matpel_id`=`matpel`.`id_matpel`
                ";
        
        return $this->db->query($query)->result_array();
    }
    
    public function ubah_profil_user($data)
    {
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('user',$data);
    }

    public function Mdelete_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
    }

    public function ubah_guru($data1)
    {
        $this->db->where('id_guru',$this->input->post('id_guru'));
        return $this->db->update('guru',$data1);
    }
    
}
