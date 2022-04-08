<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class ChatModel extends CI_Model {
                        

public function getPesan($id,$id_lawan)
{
	$this->db->from('pesan');
	$this->db->where('id= '.$id.' 
	and id_lawan='.$id_lawan .' 
	or id= ' . $id_lawan . ' 
	and id_lawan=' . $id);

	$r = $this->db->get();
	
	return $r->result();
	
}
public function TambahChatKeSatu($in)
{
	$this->db->insert('pesan', $in);
		
}
	public function getDataById($no)
	{
		$this->db->from('user');
		$this->db->where('id', $no);
		return $sql = $this->db->get()->row();

	}
	public function GetAllOrangKecUser($id)
	{
		$query = 
        "SELECT * FROM `user` WHERE `id`!=$id and role_id=3 ";
    	return $this->db->query($query)->result();
	}                                          
                        
}
    
                        