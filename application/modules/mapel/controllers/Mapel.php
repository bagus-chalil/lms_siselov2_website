<?php
use phpDocumentor\Reflection\PseudoTypes\False_;
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Mapel','mapel');
		if ( $this->session->userdata['role_id'] != 2 and $this->session->userdata['role_id'] != 1 ){
			redirect('templatef/blocked');
		}
		
	}

	public function index()
	{
		$data['title'] = "Upload Materi Pelajaran";
		$email=$this->session->userdata('email');
		$data['user'] = $this->mapel->user_login($email);
		
		$kode = $this->mapel->get_mapel_kode();
		
		error_reporting(0);
		//Generate Code
		$bulan=date('m');
		$tahun=date('Y');
		$thn=substr($tahun,2,2);
		$code= "$kode->kode_matpel";
		$penjualan = $this->mapel->getLastMapel($bulan,$tahun,$code)->row_array();
		$nomorterakhir=$penjualan['id_m_mapel'];
		$mapel_id=buatkode($nomorterakhir,$code.$bulan.$thn,4);
		$data['id_m_mapel'] = $mapel_id;	

		$data['data_guru'] = $this->mapel->get_mapel_id();
		
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['kelas'] = $this->mapel->get_mapel_kelas();

		$this->load->view('templatef/header',$data);
		$this->load->view('templatef/navbar',$data);
		$this->load->view('templatef/sidebar',$data);
		$this->load->view('u_mapel',$data);
		$this->load->view('templatef/footer');
		
		}
		public function addmapel(){
		
				$config['upload_path']   = FCPATH. './assets/Dokumen/materi/';
				$config['allowed_types'] = 'pdf|docx|doc|xlsx';
				$config['max_size']      = 15090;
				$config['encrypt_name']  = False;
				$this->load->library('upload',$config);
				//Gambar Poster
				if (!empty($_FILES['dokumen'])) {
					$config['file_name']     = url_title($this->input->post('dokumen'));
					// $filename = $this->upload->file_name;
					$this->upload->initialize($config); 
				
					$this->upload->do_upload('dokumen');
					$data2 = $this->upload->data();
					$gambar= $data2['file_name'];
				
					$data=[
						'id_m_mapel'=>$this->input->post('kode'),
						'judul'=>$this->input->post('judul'),
						'keterangan'=>$this->input->post('deskripsi'),
						'mapel_id'=>$this->input->post('mapel'),
						'kelas_id'=>$this->input->post('kelas'),
						'author'=>$this->input->post('nip'),
						'tgl_mapel'=>$this->input->post('tgl_sampai'),
						'dokumen'=>$gambar,
						'status'=>1
						
					];
					$this->db->insert('m_mapel',$data);
					$this->session->set_flashdata('message','<div class="alert alert-primary"
					role="alert">Data Matapelajaran baru berhasil ditambahkan !!!</div>');
					redirect('mapel');
				}
			}
		public function file(){
				$dokumen = $this->uri->segment(3);
				$data = file_get_contents("./assets/Dokumen/".$dokumen);
				force_download($dokumen, $data);
		} 
		// public function preview($dokumen){
		// 	$this->load->view('preview',$dokumen);
		// }
		public function hapus_mapel($id){
			$this->mapel->get_hapus_id($id);
			redirect('Mapel');
		}

		public function editmapel($id){
				$data['title'] = 'Kelas Online';
				$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
				$data['editGuruL'] = $this->mapel->get_kelas_mapel($id);
				$data['kelas'] = $this->db->get('kelas')->result_array();
				
					$this->load->view('templatef/header',$data);
					$this->load->view('templatef/navbar',$data);
					$this->load->view('templatef/sidebar',$data);
					$this->load->view('e_mapel',$data);
					$this->load->view('templatef/footer');
				}
		
		public function edit_data_mapel(){
			$kode=$this->input->post('kelas');
			$data['title'] = 'Kelas Online';
			$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('judul', 'JUDUL', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templatef/header',$data);
				$this->load->view('templatef/navbar',$data);
				$this->load->view('templatef/sidebar',$data);
				$this->load->view('u_mapel',$data);
				$this->load->view('templatef/footer');
					
		}else {
			$id_m_mapel = $this->input->post('kode');
			$config['upload_path']   = FCPATH. './assets/Dokumen/';
				$config['allowed_types'] = 'pdf|docx|doc|xlsx';
				$config['max_size']      = 15090;
				$config['encrypt_name']  = False;
			//   	$config['max_width']     = '1024';
			//   	$config['max_height']    = '768';
			$config['file_name']     = url_title($this->input->post('dokumen'));

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('dokumen')) {
				$data = array(
						'id_m_mapel'=>$this->input->post('kode'),
						'judul'=>$this->input->post('judul'),
						'keterangan'=>$this->input->post('deskripsi'),
						'mapel_id'=>$this->input->post('mapel'),
						'kelas_id'=>$this->input->post('kelas'),
						'author'=>$this->input->post('nip'),
						'tgl_mapel'=>$this->input->post('tgl_sampai'),
						'status'=>1
				);
				$this->db->where('id_m_mapel', $id_m_mapel);
				$this->db->update('m_mapel', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			 Data Matapelajaran berhasil diupdate !
			</div>');
				redirect('Guru/v_kelas_guru/'.$kode);
			} else {
				$old_image = $this->input->post('dokumen1');
				if ($old_image != 'NULL') {
					unlink(FCPATH. './assets/Dokumen/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$data = array(
					'id_m_mapel'=>$this->input->post('kode'),
					'judul'=>$this->input->post('judul'),
					'keterangan'=>$this->input->post('deskripsi'),
					'mapel_id'=>$this->input->post('mapel'),
					'kelas_id'=>$this->input->post('kelas'),
					'author'=>$this->input->post('nip'),
					'tgl_mapel'=>$this->input->post('tgl_sampai'),
					'dokumen' => $new_image,
					'status'=>1
				);
				$this->db->where('id_m_mapel', $id_m_mapel);
				$this->db->update('m_mapel', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data MataPelajaran berhasil diupdate !
			</div>');
			redirect('Guru/v_kelas_guru/'.$kode);
			}
		}
	}
	public function v_mapel(){
		$data['title'] = 'Data MataPelajaran';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['matpel'] = $this->db->get('matpel')->result_array();
		
		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('t_mapel',$data);
		$this->load->view('templatea/footer');
	}
	public function addmatpel(){
		
		$data = array(
			'nama_matpel'=>$this->input->post('matpel'),
			'kode_matpel'=>$this->input->post('k_matpel')
		);
		$this->db->insert('matpel',$data);
		$this->session->set_flashdata('message','<div class="alert alert-primary"
		role="alert">New Matapelajaran has been Added !!!</div>');
		redirect('mapel/v_mapel');
	}
	public function delete_matpel($id)
    {
        $delete = $this->mapel->Mdelete_matpel($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger"
		role="alert">Delete Menu Success !!!</div>');
		redirect('mapel/v_mapel');
    }
	public function editmatpel()
    {
        $data = array(
			'nama_matpel'=>$this->input->post('matpel'),
			'kode_matpel'=>$this->input->post('k_matpel')
		);
        $this->mapel->ubah_mapel($data);
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">Matapelajaran Successful Edit !!!</div>');
        redirect(base_url('mapel/v_mapel'));
    }
	public function view_kelas()
	{
		$data['title'] = "Data kelas";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['package'] = $this->mapel->get_fullkelas()->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('v_kelas',$data);
		$this->load->view('templatea/footer');
	}
	public function relasiGuru($kelas_id)
	{
		$data['title'] = "Data kelas";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $kelas_id])->row_array();
		
		$data['guru'] = $this->db->get('guru')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('i_kelas');
		$this->load->view('templatea/footer',$data);
	}
	public function changeAccess()
	{
		$kelas_id = $this->input->post('kelasId');
		$guru_id = $this->input->post('guruId');

		$data = [
			'kelas_id' => $kelas_id,
			'guru_id' => $guru_id
		];
		$result = $this->db->get_where('kelas_guru', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('kelas_guru', $data);
		} else {
			$this->db->delete('kelas_guru', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-primary"
		role="alert">Access Kelas Change !!!</div>');
	}
	
}	



