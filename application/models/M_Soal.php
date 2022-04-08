<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

defined('BASEPATH') or exit('No direct script access allowed');

class M_Soal extends CI_Model
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
    public function getDataSoal($id, $guru)
    {
        $this->datatables->select('a.id_soal, a.soal, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matpel, c.nama_guru');
        $this->datatables->from('tb_soal a');
        $this->datatables->join('matpel b', 'b.id_matpel=a.matpel_id');
        $this->datatables->join('guru c', 'c.id_guru=a.guru_id');
        if ($id!==null && $guru===null) {
            $this->datatables->where('a.matpel_id', $id);            
        }else if($id!==null && $guru!==null){
            $this->datatables->where('a.guru_id', $guru);
        }
        return $this->datatables->generate();
    }
    public function getAllGuru()
    {
        $this->db->select('*');
        $this->db->from('guru a');
        $this->db->join('matpel b', 'a.matpel_id=b.id_matpel');
        return $this->db->get()->result();
    }
	public function getMatpelGuru($nip)
    {
        $query="SELECT matpel_id, nama_matpel, id_guru, nama_guru 
        FROM guru 
        JOIN matpel on matpel_id=id_matpel
        WHERE nip=$nip";
        return $this->db->query($query)->row();
    }
	public function getSoalById($id)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $id])->row();
    }
    public function getAllMatkul()
    {
        return $this->db->get('matkul')->result();
    }
    //CRUD FUNCTION
	public function create($table, $data, $batch = false)
    {
        if ($batch === false) {
            $insert = $this->db->insert($table, $data);
        } else {
            $insert = $this->db->insert_batch($table, $data);
        }
        return $insert;
    }

    public function update($table, $data, $pk, $id = null, $batch = false)
    {
        if ($batch === false) {
            $insert = $this->db->update($table, $data, array($pk => $id));
        } else {
            $insert = $this->db->update_batch($table, $data, $pk);
        }
        return $insert;
    }

    public function delete($table, $data, $pk)
    {
        $this->db->where_in($pk, $data);
        return $this->db->delete($table);
    }
}