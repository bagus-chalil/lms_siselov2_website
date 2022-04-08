<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

defined('BASEPATH') or exit('No direct script access allowed');

class M_Relasi extends CI_Model
{
    public function add_matpel($matpel_id,$kelas_id)
    {
        $this->db->trans_start();
			//GET ID PACKAGE
			$result = array();
			    foreach($matpel_id AS $key => $val){
				     $result[] = array(
				      'kelas_id'  	=> $kelas_id,
				      'matpel_id'  	=> $_POST['matpel_id'][$key]
				     );
			    }      
			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('kelas_matpel', $result);
		$this->db->trans_complete();
    }
	public function get_fullkelas(){
		$this->db->select('kelas.*,COUNT(kelas_matpel.matpel_id) AS matpel');
		$this->db->from('kelas_matpel');
		$this->db->join('kelas', 'kelas_matpel.kelas_id=kelas.id_kelas');
		$this->db->join('matpel', 'kelas_matpel.matpel_id=matpel.id_matpel');
		$this->db->group_by('kelas_matpel.kelas_id');
		$query = $this->db->get();
		return $query;
	}
    //GET PRODUCT BY PACKAGE ID
	function get_product_by_package($id_kelas){
		$this->db->select('*');
		$this->db->from('matpel');
		$this->db->join('kelas_Matpel', 'matpel_id=id_matpel');
		$this->db->join('kelas', 'id_kelas=kelas_id');
		$this->db->where('id_kelas',$id_kelas);
		$query = $this->db->get();
		return $query;
	}
	public function Mdelete_kelas($id)
    {
        $this->db->where('id_kelas', $id);
        return $this->db->delete('kelas');
    }
}