<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Kelas','kelas');
		if ( $this->session->userdata['role_id'] != 3 ){
			redirect('templatef/blocked');
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman Belajar';
		$email=$this->session->userdata('email');
		$data['user'] = $this->kelas->user_login($email);

		$this->load->view('templatef/kelas_online/header',$data);
		$this->load->view('templatef/kelas_online/topbar',$data);
		$this->load->view('kelas',$data);
		$this->load->view('templatef/kelas_online/footer',$data);
	}
	public function v_kelas_online($nisn)
	{
		$data['title'] = 'Kelas Online';
		$email=$this->session->userdata('email');
		$data['user'] = $this->kelas->user_login($email);
		$data['mapelL'] = $this->kelas->get_kelas_online($nisn);


		$this->load->view('templatef/kelas_online/header',$data);
		$this->load->view('templatef/kelas_online/topbar',$data);
		$this->load->view('kelas_online',$data);
		$this->load->view('templatef/kelas_online/footer',$data);
	}
	public function v_kelas_id($id_matpel)
	{
		$data['title'] = 'Kelas Online';
		$email=$this->session->userdata('email');
		$data['user'] = $this->kelas->user_login($email);
		$data['mapelGuruL'] = $this->kelas->get_kelas_mapel($id_matpel);
		$data['absensiSiswa'] = $this->kelas->getAbsenSiswa();
		$data['mapels']= $this->db->get_where('matpel',['id_matpel' => $id_matpel])->row_array();

		$this->load->view('templatef/kelas_online/header',$data);
		$this->load->view('templatef/kelas_online/topbar',$data);
		$this->load->view('kelas_online_id',$data);
		$this->load->view('templatef/kelas_online/footer',$data);
	}
	public function absen_siswa(){
		$data = $this->input->post('kelas_id');
		$data1 = [
			'absen_id'	=> $this->input->post('id_absen'),
			'nisn'		=> $this->input->post('nisn'),
			'tgl_absen_siswa'=> time(),
			'status'	=> $this->input->post('status')
		];
		$this->db->insert('absensi_siswa',$data1);
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">Absen telah berhasil !!!</div>');
		redirect('kelas/v_kelas_id/'.$data);
	}
	public function v_tugas($id_tugas)
	{
		error_reporting(0);
		$data['title'] = 'Kelas Online';
		$email=$this->session->userdata('email');
		$data['user'] = $this->kelas->user_login($email);
		
		$data['v_tugas'] = $this->kelas->getTugas($id_tugas);
		$data['tugas_siswa'] = $this->kelas->getTugasSiswa($id_tugas);
		$data['id']=$id_tugas;

		$this->load->view('templatef/kelas_online/header',$data);
		$this->load->view('templatef/kelas_online/topbar',$data);
		$this->load->view('tugas',$data);
		$this->load->view('templatef/kelas_online/footer',$data);
		
	}
	public function file(){
		$dokumen = $this->uri->segment(3);
		$data = file_get_contents("./assets/Dokumen/".$dokumen);
		force_download($dokumen, $data);
	} 
	public function addTugas(){
		
		$url=$this->input->post('id_tugas');
		$config['upload_path']   = FCPATH. './assets/Dokumen/tugas_siswa';
		$config['allowed_types'] = 'pdf|docx|apk';
		$config['max_size']      = 15090;
		$config['encrypt_name']  = False;
		$this->load->library('upload',$config);
		
		if (!empty($_FILES['dokumen'])) {
			$config['file_name']     = url_title($this->input->post('dokumen'));
			// $filename = $this->upload->file_name;
			$this->upload->initialize($config); 
		
			$this->upload->do_upload('dokumen');
			$data2 = $this->upload->data();
			$gambar= $data2['file_name'];
		
			$data=[
				'tugas_id'=>$this->input->post('id_tugas'),
				'nisn'=>$this->input->post('nisn'),
				'deskripsi_hasil'=>$this->input->post('deskripsi'),
				'dokumen_hasil'=>$gambar,
				'waktu_pengumpulan'=>time(),
				'status_tugas'=>1
				
			];
			$this->db->insert('tugas_siswa',$data);
			$this->session->set_flashdata('message','<div class="alert alert-primary"
			role="alert">Tugas Berhasil Dikumpulkan !!!</div>');
			redirect('kelas/v_tugas/'.$url);
		}
	}
	public function editTugas(){
		$data['title'] = 'Halaman Kelas Online';
		$email=$this->session->userdata('email');
		$data['user'] = $this->kelas->user_login($email);

		$this->form_validation->set_rules('kode', 'KODE', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templatef/kelas_online/header',$data);
			$this->load->view('templatef/kelas_online/topbar',$data);
			$this->load->view('tugas',$data);
			$this->load->view('templatef/kelas_online/footer',$data);
				
	}else {
		$url=$this->input->post('id_tugas');
		$config['upload_path']   = FCPATH. './assets/Dokumen/tugas_siswa';
		$config['allowed_types'] = 'pdf|docx|apk';
		$config['max_size']      = 15090;
		$config['encrypt_name']  = False;
		$this->load->library('upload',$config);
		$config['file_name']     = url_title($this->input->post('dokumen'));

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('dokumen')) {
			$data = array(
				'tugas_id'=>$this->input->post('id_tugas'),
				'nisn'=>$this->input->post('nisn'),
				'deskripsi_hasil'=>$this->input->post('deskripsi'),
				'waktu_pengumpulan'=>time(),
				'status_tugas'=>1
			);
			$this->db->where('tugas_id', $url);
			$this->db->update('tugas_siswa', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Tugas Siswa has been Update!
		</div>');
			redirect('kelas/v_tugas/'.$url);
		} else {
			$old_document = $this->input->post('dokumen1');
			if ($old_document != 'NULL') {
				unlink(FCPATH. './assets/Dokumen/tugas_siswa/' . $old_document);
			}
			$new_document = $this->upload->data('file_name');
			$data = array(
				'tugas_id'=>$this->input->post('id_tugas'),
				'nisn'=>$this->input->post('nisn'),
				'deskripsi_hasil'=>$this->input->post('deskripsi'),
				'dokumen_hasil' => $new_document,
				'waktu_pengumpulan'=>time(),
				'status_tugas'=>1
		);
		$this->db->where('tugas_id', $url);
		$this->db->update('tugas_siswa', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Tugas has been Update!
		</div>');
			redirect('kelas/v_tugas/'.$url);
			}
		}
	}

}