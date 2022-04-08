<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
	
        $this->load->library('form_validation');
		$this->load->model('M_Pengumuman','pengumuman');
    }
	public function index()
	{
		$data['title'] = "Pengumuman";
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['pengumuman'] = $this->db->get('pengumuman')->result_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('pengumuman',$data);
		$this->load->view('templatea/footer');
	}
	public function addPengumuman(){
		
		$config['upload_path']   = FCPATH. './assets/Dokumen/pengumuman/';
		$config['allowed_types'] = 'pdf|docx|png';
		$config['max_size']      = 10090;
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
				'user_id'=>$this->input->post('id_user'),
				'judul'=>$this->input->post('judul'),
				'deskripsi'=>$this->input->post('isi'),
				'tgl_pengumuman'=>$this->input->post('tgl_pengumuman'),
				'dokumen'=>$gambar,
				'status_pengumuman'=>1
				
			];
			$this->db->insert('pengumuman',$data);
			$this->session->set_flashdata('message','<div class="alert alert-primary"
			role="alert">Pengumuman baru berhasil ditambahkan !!!</div>');
			redirect('pengumuman');
		}
	}
	public function file(){
		$dokumen = $this->uri->segment(3);
		$data = file_get_contents("./assets/Dokumen/pengumuman/".$dokumen);
		force_download($dokumen, $data);
	} 
	public function data_edit($id_pengumuman)
	{
		$data['title'] = "Pengumuman";
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['pengumuman'] = $this->db->get_where('pengumuman',['id_pengumuman'=>$id_pengumuman])->row_array();

		$this->load->view('templatea/header',$data);
		$this->load->view('templatea/sidebar',$data);
		$this->load->view('edit_pengumuman',$data);
		$this->load->view('templatea/footer');
	}
	public function editPengumuman(){
		$this->form_validation->set_rules('judul', 'JUDUL', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			redirect('pengumuman');	
		}else {
			$id_pengumuman = $this->input->post('id_pengumuman');
			$config['upload_path']   = FCPATH. './assets/Dokumen/pengumuman/';
				$config['allowed_types'] = 'pdf|png|docx';
				$config['max_size']      = 10090;
				$config['encrypt_name']  = False;
			//   	$config['max_width']     = '1024';
			//   	$config['max_height']    = '768';
			$config['file_name']     = url_title($this->input->post('judul'));

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('dokumen')) {
				$data = array(
					'user_id'=>$this->input->post('id_user'),
					'judul'=>$this->input->post('judul'),
					'deskripsi'=>$this->input->post('isi'),
					'tgl_pengumuman'=>$this->input->post('tgl_pengumuman'),
					'status_pengumuman'=>$this->input->post('is_active')
				);
				$this->db->where('id_pengumuman', $id_pengumuman);
				$this->db->update('pengumuman', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pengumuman telah berhasil diubah !
			</div>');
				redirect('pengumuman');
			} else {
				$old_image = $this->input->post('dokumen1');
				if ($old_image != 'NULL') {
					unlink(FCPATH. './assets/Dokumen/pengumuman/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$data = array(
					'user_id'=>$this->input->post('id_user'),
					'judul'=>$this->input->post('judul'),
					'deskripsi'=>$this->input->post('isi'),
					'tgl_pengumuman'=>$this->input->post('tgl_pengumuman'),
					'dokumen' => $new_image,
					'status_pengumuman'=>$this->input->post('is_active')
				);
				$this->db->where('id_pengumuman', $id_pengumuman);
				$this->db->update('pengumuman', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Pengumuman telah berhasil diubah!
			</div>');
				redirect('pengumuman');
			}
		}
	}
	public function deletePengumuman($id_pengumuman)
    {
        $delete = $this->pengumuman->Mdelete_pengumuman($id_pengumuman);
        $this->session->set_flashdata('message','<div class="alert alert-danger"
		role="alert">Pengumuman telah berhasil dihapus !!!</div>');
		redirect('pengumuman');
    }	
}
