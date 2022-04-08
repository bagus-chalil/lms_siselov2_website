<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mapel extends CI_Model
{
    public function Mdelete_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
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
	public function get_mapel_id(){
		$data=$this->session->userdata('nip');
		$query = "SELECT `kelas`.*,`guru`.*,`matpel`.*,`kelas_guru`.* 
					FROM `guru`  
					LEFT JOIN `kelas_guru`
					on `kelas_guru`.`guru_id`=`guru`.`id_guru`
					LEFT JOIN `kelas` 
					on `kelas`.`id_kelas`=`kelas_guru`.`kelas_id` 
					LEFT JOIN `matpel`
					on `matpel`.`id_matpel`=`guru`.`matpel_id`
					Where `guru`.`nip` = $data"
        ;
        return $this->db->query($query)->row_array();
	}
	public function get_mapel_kode(){
		$data=$this->session->userdata('nip');
		$query = "SELECT `matpel`.`kode_matpel` 
					FROM `user` 
					LEFT JOIN `user_role` 
					on `user`.`role_id`=`user_role`.`id` 
					LEFT JOIN `guru`
					on `guru`.`user_id`=`user`.`id`
					LEFT JOIN `kelas_guru` 
					on `kelas_guru`.`guru_id`=`guru`.`id_guru` 
					LEFT JOIN `matpel`
					on `matpel`.`id_matpel`=`guru`.`matpel_id`
					WHERE `guru`.`nip`=".$data
        ;
        return $this->db->query($query)->row();
	}
	public function get_mapel_kelas(){
		$data=$this->session->userdata('nip');
		$query = "SELECT `kelas`.* 
					FROM `kelas`  
					LEFT JOIN `kelas_guru`
					on `kelas`.`id_kelas`=`kelas_guru`.`kelas_id`
					LEFT JOIN `guru` 
					on `guru`.`id_guru`=`kelas_guru`.`guru_id` 
					WHERE `guru`.`nip`=".$data
					;
        return $this->db->query($query)->result_array();
	}
	public function getLastMapel($bulan,$tahun,$code)
    {
            $this->db->select('m_mapel.id_m_mapel');
            $this->db->from('m_mapel');
            $this->db->join('matpel','m_mapel.mapel_id = matpel.id_matpel','left');
            $this->db->order_by('m_mapel.id_m_mapel','DESC');
            $this->db->where('matpel.kode_matpel=',$code);
            $this->db->where('MONTH(tgl_mapel)',$bulan);
            $this->db->where('YEAR(tgl_mapel)',$tahun);
            $this->db->limit(1);
        return $this->db->get();
    }
	public function get_kelas_mapel($id){
        $data= $this->session->userdata('nip');
		
		$query = "SELECT `m_mapel`.*,`matpel`.*,`kelas`.* 
					FROM `m_mapel`
					LEFT JOIN `kelas` on `kelas`.`id_kelas`=`m_mapel`.`kelas_id`
					LEFT JOIN `matpel` on `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
					WHERE `m_mapel`.`author`=$data
					AND `m_mapel`.`id`= $id
				";
        return $this->db->query($query)->row_array();
	}
	public function get_hapus_id($id){
		$row = $this->db->where('id',$id)->get('m_mapel')->row();
		unlink(FCPATH. './assets/Dokumen/' . $row->dokumen);
        $this->db->where('id', $id);
        $this->db->delete('m_mapel');
        return true; 
	}
	public function Mdelete_matpel($id)
    {
        $this->db->where('id_matpel', $id);
        return $this->db->delete('matpel');
    }
	public function ubah_mapel($data)
    {
        $this->db->where('id_matpel',$this->input->post('id'));
        return $this->db->update('matpel',$data);
    }
	public function get_fullkelas(){
		$this->db->select('kelas.*,COUNT(kelas_guru.guru_id) AS guru');
		$this->db->from('kelas_guru');
		$this->db->join('kelas', 'kelas_guru.kelas_id=kelas.id_kelas');
		$this->db->join('guru', 'kelas_guru.guru_id=guru.id_guru');
		$this->db->group_by('kelas_guru.kelas_id');
		$query = $this->db->get();
		return $query;
	}
	function get_product_by_package($id_kelas){
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('kelas_guru', 'kelas_guru.guru_id=guru.id_guru');
		$this->db->join('kelas', 'kelas.id_kelas=kelas_guru.kelas_id');
		$this->db->where('kelas.id_kelas',$id_kelas);
		$query = $this->db->get();
		return $query;
	}
}