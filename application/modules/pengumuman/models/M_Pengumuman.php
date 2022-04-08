<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengumuman extends CI_Model
{
    public function Mdelete_menu($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_menu');
    }
    public function Mdelete_pengumuman($id_pengumuman){
		$row = $this->db->where('id_pengumuman',$id_pengumuman)->get('pengumuman')->row();
		unlink(FCPATH. './assets/Dokumen/pengumuman/' . $row->dokumen);
        $this->db->where('id_pengumuman', $id_pengumuman);
        $this->db->delete('pengumuman');
        return true; 
	}
}